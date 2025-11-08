<?php

namespace App\Http\Controllers\Admin\Intramurals;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\intramurals\IntraEvent;

class UserEventController extends Controller
{
    public function index(Request $request) // ← inject Request here
    {
        // Start query
        $query = IntraEvent::query();

        // Optional search filter
        if ($request->filled('search')) {
            $query->where('event_name', 'like', '%' . $request->search . '%');
        }

        // Fetch events from database
        $events = $query->orderBy('event_name')->get();

        return view('intramurals.User.intramurals-eventspage', compact('events'));
    }
}
