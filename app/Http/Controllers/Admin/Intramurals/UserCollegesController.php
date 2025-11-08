<?php

namespace App\Http\Controllers\Admin\Intramurals;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Intramurals\IntraColleges;

class UserCollegesController extends Controller
{
    public function index()
    {
        // Fetch all colleges
        $colleges = IntraColleges::orderBy('college_name')->get();

        return view('intramurals.User.intramurals-collegespage', compact('colleges'));
    }
}
