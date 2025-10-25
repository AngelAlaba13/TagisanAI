<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActiveEventSetting;
use Illuminate\Http\Request;

class EventSelectionController extends Controller
{
    public function setActiveEvent(Request $request)
    {
        $validated = $request->validate([
            'event' => 'required|in:intramurals,masts,events',
        ]);

        ActiveEventSetting::setActiveEvent($validated['event']);

        switch ($validated['event']) {
        case 'intramurals':
            return redirect()
                ->route('intramurals.Department Points.department-points')
                ->with('success', 'Intramurals is now active.');

        case 'masts':
            return redirect()
                ->route('localMasts.Campus Points.campus-points')
                ->with('success', 'Local MASTS is now active.');

        case 'events':
            return redirect()
                ->route('otherEvents.Team Points.team-points')
                ->with('success', 'Other Events is now active.');
        }

        // Fallback (shouldn’t happen)
        return back()->with('error', 'Invalid event selection.');
    }
}
