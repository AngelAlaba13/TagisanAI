<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IsaiChatbotController extends Controller
{
    public function index()
    {
        return view('isai-chatbot');
    }
}
