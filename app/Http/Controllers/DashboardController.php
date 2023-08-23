<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('home', [
            'changelogs' => Message::all()->count(),
            'messages' => Message::where('type', 'changelog')->latest()->paginate(3)
        ]);
    }
}
