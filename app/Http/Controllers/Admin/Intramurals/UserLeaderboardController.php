<?php

namespace App\Http\Controllers\Admin\Intramurals;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\intramurals\intraLeaderboard;
use App\Models\intramurals\intraColleges;
use Illuminate\Support\Facades\DB;

class UserLeaderboardController extends Controller
{
    public function index()
    {
        // Get top 5 colleges with their total gold points
        $leaderboard = intraLeaderboard::with('intraCollege')
            ->select('college_id', DB::raw('SUM(gold) as total_gold'))
            ->groupBy('college_id')
            ->orderByDesc('total_gold')
            ->take(5)
            ->get();

        // Add rank numbers
        $ranked = $leaderboard->map(function ($item, $index) {
            $item->rank = $index + 1;
            return $item;
        });

        // Get all colleges for the "COLLEGES" section
        $colleges = intraColleges::all();

        // Return view with both collections
        return view('intramurals.User.intramurals-homepage', [
            'ranked' => $ranked,
            'colleges' => $colleges,
        ]);
    }
}
