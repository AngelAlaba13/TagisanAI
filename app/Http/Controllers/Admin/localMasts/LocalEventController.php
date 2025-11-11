<?php

namespace App\Http\Controllers\Admin\LocalMasts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use App\Models\localMasts\localEvent;

class LocalEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all events from the database
        $localEvents = localEvent::orderBy('created_at', 'desc')->paginate(10);

        // Return view with events
        return view('localMasts.Manage Events.manage-localM-events', compact('localEvents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Get all PNG filenames from public/icons
        $icons = collect(File::files(public_path('icons')))
                    ->map(fn($file) => $file->getFilename());

        return view('localMasts.Manage Events.add-localM-events', compact('icons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'event_name' => 'required|string|max:150',
            'category' => 'required|string|max:150',
            'description' => 'nullable|string|max:225',
            'icon' => 'nullable|string|max:100',
        ]);

        localEvent::create([
            'event_name' => $request->event_name,
            'category'   => $request->category,
            'description'=> $request->description,
            'icon'       => $request->icon,
        ]);

        return redirect()->route('localMasts.Manage Events.manage-localM-events')
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
            localEvent::create([
                'event_name' => $ev['event_name'],
                'category' => $ev['category'],
                'description' => $ev['description'] ?? null,
                'icon' => $ev['icon'] ?? null,
            ]);
        }

        return response()->json(['message' => 'Events saved successfully'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Load event and icons, then return edit view
        $localEvents = localEvent::findOrFail($id);

        // Get all PNG filenames from public/icons
        $icons = collect(File::files(public_path('icons')))
                    ->map(fn($file) => $file->getFilename());
        

        return view('localMasts.Manage Events.edit-localM-events', compact('localEvents', 'icons'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $localEvents = localEvent::findOrFail($id);

        $validated = $request->validate([
            'event_name' => 'required|string|max:150',
            'category' => 'required|string|max:150',
            'description' => 'nullable|string|max:225',
            'icon' => 'nullable|string|max:100',
        ]);

        $localEvents->update([
            'event_name' => $validated['event_name'],
            'category' => $validated['category'],
            'description' => $validated['description'] ?? null,
            'icon' => $validated['icon'] ?? null,
        ]);

        return redirect()->route('localMasts.Manage Events.manage-localM-events')
                         ->with('success', 'Event updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $localEvents = localEvent::findOrFail($id);
        $localEvents->delete();

        return redirect()->route('localMasts.Manage Events.manage-localM-events')
                         ->with('success', 'Event deleted successfully!');
    }
}
