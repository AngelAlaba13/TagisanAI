<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OtherEventsController extends Controller
{
    public function teamPoints()
    {
        return view('otherEvents.Team Points.team-points');
    }
}
