<?php

namespace App\Http\Controllers;

use App\Models\Tryouts;
use Illuminate\Http\Request;

class TryoutsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tryouts = Tryouts::latest()->get();
        return view('OtherFiles.DefaultHome.defaultHome', compact('tryouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('OtherFiles.DefaultHome.create-tryout');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'tryout_name' => 'required|string|max:255',
        'coach_name' => 'nullable|string|max:255',
        'tryout_description' => 'nullable|string',
        'tryout_requirements' => 'nullable|string',
        'tryout_schedule' => 'nullable|date',
        'tryout_link' => 'nullable|url',
        'image_path' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

        // Handle file upload
        $imagePath = null;
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('tryoutEvents', 'public');
        }

        Tryouts::create([
            'tryout_name' => $validated['tryout_name'],
            'coach_name' => $validated['coach_name'] ?? null,
            'tryout_description' => $validated['tryout_description'] ?? null,
            'tryout_requirements' => $validated['tryout_requirements'] ?? null,
            'tryout_schedule' => $validated['tryout_schedule'] ?? null,
            'tryout_link' => $validated['tryout_link'] ?? null,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('tryouts.index')->with('success', 'Tryout event created successfully!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
