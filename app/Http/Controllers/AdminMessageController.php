<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\message;

class AdminMessageController extends Controller
{
    public function viewMessages()
    {
        $messages = message::all(); // You can modify this query to suit your needs

        return view('admin.view-messages', compact('messages'));
    }
}