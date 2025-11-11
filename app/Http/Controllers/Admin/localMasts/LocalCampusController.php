<?php

namespace App\Http\Controllers\Admin\localMasts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use App\Models\localMasts\localCampuses;

class LocalCampusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all colleges from the database
        $campuses = localCampuses::orderBy('created_at', 'desc')->paginate(10);

        // Return view with colleges
        return view('localMasts.Manage Campuses.manage-localM-campuses', compact('campuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        // Load college and icons, then return edit view
        $campuses = localCampuses::findOrFail($id);

        // Get all PNG filenames from public/college_logos
        $logos = collect(File::files(public_path('campus_logo')))
                    ->map(fn($file) => $file->getFilename());

        return view('localMasts.Manage Campuses.edit-campuses', compact('campuses', 'logos'));
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
        $campuses = localCampuses::findOrFail($id);
        $campuses->delete();

        return redirect()->route('localMasts.Manage Campuses.manage-localM-campuses')
                         ->with('success', 'Campus deleted successfully!');
    }
}
