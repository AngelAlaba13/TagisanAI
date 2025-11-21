<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ActiveEventSetting;
use App\Helpers\DatabaseHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    public function index()
    {
        $activeEvent = ActiveEventSetting::getActiveEvent();

        if (!$activeEvent) {
            return view('adminPanel.main');
        }


        // -------------------TEMPORARYY!!!!!!!-------------------

        // ✅ Otherwise, switch to that event's database
        DatabaseHelper::switchConnection($activeEvent);

        return view('OtherFiles.DefaultHome.defaultHome', compact('activeEvent'));
    }
}
