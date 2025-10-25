<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocalMastsController extends Controller
{
    public function campusPoints()
    {
        return view('localMasts.Campus Points.campus-points');
    }
}
