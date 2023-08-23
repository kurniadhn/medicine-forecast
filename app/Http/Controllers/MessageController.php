<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        return view('root.changelog.index', [
            'messages' => Message::where('type', 'changelog')->latest()->paginate(5)
        ]);
    }
}
