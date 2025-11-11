<?php

namespace App\Http\Controllers\Admin\localMasts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\localMasts\localLeaderboard;
use App\Models\localMasts\localCampuses;
use App\Models\localMasts\localEvent;
use Illuminate\Support\Facades\DB;

class LocalLeaderboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get leaderboard joined with college names
        $localLeaderboard = localLeaderboard::with('localCampuses')
            ->select('campus_id', DB::raw('SUM(gold) as total_gold'))
            ->groupBy('campus_id')
            ->orderByDesc('total_gold')
            ->get();

        // Add rank manually
        $ranked = $localLeaderboard->map(function ($item, $index) {
            $item->rank = $index + 1;
            return $item;
        });

        return view('localMasts.Campus Points.campus-points', [
            'localLeaderboard' => $ranked
        ]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'gold' => 'required|integer|min:0',
        ]);

        // Find or create record
        $entry = localLeaderboard::firstOrCreate(['campus_id' => $id]);
        $entry->gold = $request->input('gold');
        $entry->save();

        return redirect()->back()->with('success', 'Campus score updated successfully.');
    }

    /**
     * Set overall ranking based on current scores.
     */
    public function setOverallRanking()
    {
        $campuses = localLeaderboard::select('campus_id', DB::raw('SUM(gold) as total_gold'))
            ->groupBy('campus_id')
            ->orderByDesc('total_gold')
            ->get();

        $rank = 1;
        foreach ($campuses as $campus) {
            localCampuses::where('id', $campus->campus_id)
                ->update(['ranking' => $rank++]);
        }

        return redirect()->back()->with('success', 'Overall ranking updated successfully.');
    }

    public function eventList()
    {
        $localEvent = localEvent::all();
        return view('localMasts.Campus Points.localM-event-list', compact('localEvent'));
    }


    public function editGold($eventId)
    {
        $localEvent = localEvent::findOrFail($eventId);
        $campuses = localCampuses::all();

        $existingGolds = localLeaderboard::where('event_id', $localEvent->id)
                            ->pluck('gold', 'campus_id')
                            ->toArray();

        return view('localMasts.Campus Points.localM-edit-gold', compact('localEvent', 'campuses', 'existingGolds'));
    }


    // Save gold points for the selected event
    public function updateGold(Request $request, $eventId)
    {
        $request->validate([
            'gold' => 'required|array',
            'gold.*' => 'integer|min:0',
        ]);

        $localEvent = localEvent::findOrFail($eventId);
        $data = $request->input('gold'); // array: campus_id => gold
        
        foreach ($data as $campusId => $gold) {
            localLeaderboard::updateOrCreate(
                ['event_id' => $localEvent->id, 'campus_id' => $campusId],
                ['gold' => $gold]
            );
        }

        return redirect()->route('localMasts.Campus Points.localM-event-list')
                        ->with('success', 'Gold points updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
