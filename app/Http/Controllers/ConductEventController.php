<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConductEvent;

class ConductEventController extends Controller
{
    public function create()
    {
        return view('otherFiles.conductEvent');
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email',
            'contact_number' => 'required|string|max:15',
            'event_description' => 'required|string',
            'event_purpose' => 'required|string',
        ]);

        ConductEvent::create($request->all());

        return redirect()->route('conductEvent.pending');
    }

    public function pending()
    {
        return view('otherFiles.conductEventPending');
    }

    public function adminPanel()
    {
        return view('adminPanel.main');
    }
}
