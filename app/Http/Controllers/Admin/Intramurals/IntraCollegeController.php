<?php

namespace App\Http\Controllers\Admin\Intramurals;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use App\Models\intramurals\intraColleges;

class IntraCollegeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all colleges from the database
        $colleges = intraColleges::orderBy('created_at', 'desc')->paginate(10);

        // Return view with colleges
        return view('intramurals.Manage Departments.manage-departments', compact('colleges'));
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
        $colleges = intraColleges::findOrFail($id);

        // Get all PNG filenames from public/college_logos
        $logos = collect(File::files(public_path('college_logos')))
                    ->map(fn($file) => $file->getFilename());

        return view('intramurals.Manage Events.edit-events', compact('colleges', 'logos'));
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
        $colleges = intraColleges::findOrFail($id);
        $colleges->delete();

        return redirect()->route('intramurals.Manage Departments.manage-departments')
                         ->with('success', 'Department deleted successfully!');
    }
}
