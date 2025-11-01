<?php

namespace App\Http\Controllers\Admin\Intramurals;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use App\Models\intramurals\intraEvent;

class IntraEventController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        // Fetch all events from the database
        $events = intraEvent::orderBy('created_at', 'desc')->paginate(10);

        // Return view with eve nts
        return view('intramurals.Manage Events.manage-events', compact('events'));
    }



    // -----------CREATE and STORE method. Continue-----------

    // Show the form for creating a new resource.
    public function create()
    {
        // Get all PNG filenames from public/icons
        $icons = collect(File::files(public_path('icons')))
                    ->map(fn($file) => $file->getFilename());

        return view('intramurals.Manage Events.add-events', compact('icons'));
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
         $request->validate([
            'event_name' => 'required|string|max:150',
            'category' => 'required|string|max:150',
            'description' => 'nullable|string|max:225',
            'icon' => 'nullable|string|max:100',
        ]);

        intraEvent::create([
            'event_name' => $request->event_name,
            'category'   => $request->category,
            'description'=> $request->description,
            'icon'       => $request->icon,
        ]);

        return redirect()->route('intramurals.Manage Events.manage-events')
                     ->with('success', 'Event created successfully!');
    }

    /**
     * Store multiple events (bulk) — used by OCR extracted results.
     */
    public function storeMultiple(Request $request)
    {
        $data = $request->validate([
            'events' => 'required|array|min:1',
            'events.*.event_name' => 'required|string|max:150',
            'events.*.category' => 'required|string|max:150',
            'events.*.description' => 'nullable|string|max:225',
            'events.*.icon' => 'nullable|string|max:100',
        ]);

        foreach ($data['events'] as $ev) {
            intraEvent::create([
                'event_name' => $ev['event_name'],
                'category' => $ev['category'],
                'description' => $ev['description'] ?? null,
                'icon' => $ev['icon'] ?? null,
            ]);
        }

        return response()->json(['message' => 'Events saved successfully'], 201);
    }

    
    // // Display the specified resource.
    // public function show(string $id)
    // {
    //     $event = intraEvent::findOrFail($id);

    //     return view('intramurals.Manage Events.show-event', compact('events'));
    // }


    // -----------EDIT and UPDATE methods. Continue-----------

    // Show the form for editing the specified resource.
    public function edit(string $id)
    {
        // Load event and icons, then return edit view
        $events = intraEvent::findOrFail($id);

        // Get all PNG filenames from public/icons
        $icons = collect(File::files(public_path('icons')))
                    ->map(fn($file) => $file->getFilename());
        

        return view('intramurals.Manage Events.edit-events', compact('events', 'icons'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, string $id)
    {
        $events = intraEvent::findOrFail($id);

        $validated = $request->validate([
            'event_name' => 'required|string|max:150',
            'category' => 'required|string|max:150',
            'description' => 'nullable|string|max:225',
            'icon' => 'nullable|string|max:100',
        ]);

        $events->update([
            'event_name' => $validated['event_name'],
            'category' => $validated['category'],
            'description' => $validated['description'] ?? null,
            'icon' => $validated['icon'] ?? null,
        ]);

        return redirect()->route('intramurals.Manage Events.manage-events')
                         ->with('success', 'Event updated successfully!');
    }



    // Remove the specified resource from storage.
    public function destroy(string $id)
    {
        $events = intraEvent::findOrFail($id);
        $events->delete();

        return redirect()->route('intramurals.Manage Events.manage-events')
                         ->with('success', 'Event deleted successfully!');
    }
}
