<?php

namespace App\Http\Controllers\Admin\Intramurals;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\intramurals\intraLeaderboard;
use App\Models\intramurals\intraColleges;
use Illuminate\Support\Facades\DB;

class IntraLeaderboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get leaderboard joined with college names
        $leaderboard = intraLeaderboard::with('intraCollege')
            ->select('college_id', DB::raw('SUM(gold) as total_gold'))
            ->groupBy('college_id')
            ->orderByDesc('total_gold')
            ->get();

        // Add rank manually
        $ranked = $leaderboard->map(function ($item, $index) {
            $item->rank = $index + 1;
            return $item;
        });

        return view('intramurals.Department Points.department-points', [
            'leaderboard' => $ranked
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
        $entry = intraLeaderboard::firstOrCreate(['college_id' => $college_id]);
        $entry->gold = $request->input('gold');
        $entry->save();

        return redirect()->back()->with('success', 'College score updated successfully.');
    }

    /**
     * Set overall ranking based on current scores.
     */
    public function setOverallRanking()
    {
        $colleges = intraLeaderboard::select('college_id', DB::raw('SUM(gold) as total_gold'))
            ->groupBy('college_id')
            ->orderByDesc('total_gold')
            ->get();

        $rank = 1;
        foreach ($colleges as $college) {
            intraColleges::where('id', $college->college_id)
                ->update(['ranking' => $rank++]);
        }

        return redirect()->back()->with('success', 'Overall ranking updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
