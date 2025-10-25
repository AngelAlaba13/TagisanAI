<?php

namespace App\Http\Controllers\Admin\Intramurals;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IntraEventController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        //
    }



    // -----------CREATE and STORE method. Continue-----------

    // Show the form for creating a new resource.
    public function create()
    {
        return view('intramurals.Manage Events.add-events');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        //
    }

    
    // Display the specified resource.
    public function show(string $id)
    {
        //
    }



    // -----------EDIT and UPDATE methods. Continue-----------

    // Show the form for editing the specified resource.
    public function edit(string $id)
    {
        //
    }

    // Update the specified resource in storage.
    public function update(Request $request, string $id)
    {
        //
    }



    // Remove the specified resource from storage.
    public function destroy(string $id)
    {
        //
    }
}
