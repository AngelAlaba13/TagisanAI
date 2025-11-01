<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorHandlingController extends Controller
{

    /*
    UI Related Errors-it throws this page
        - preview icons error
        -- add more as needed
    */
    public function error520()
    {
        return view('error-handling.error520');
    }
}
