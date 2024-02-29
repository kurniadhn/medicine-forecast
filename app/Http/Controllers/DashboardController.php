<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use App\Models\Medicine;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('home', [
            'activated' => User::where('status', 'activated')->count(),
            'deactivated' => User::whereNot('status', 'activated')->count(),
            'totalChangelog' => Message::where('type', 'changelog')->count(),
            'totalActivity' => Message::where('type', 'activity')->count(),
            'medicines' => Medicine::all()->count(),
            'activities' => Message::where('type', 'activity')->latest()->paginate(3),
            'changelogs' => Message::where('type', 'changelog')->latest()->paginate(3),
        ]);
    }
}
