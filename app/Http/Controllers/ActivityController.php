<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function activities()
    {
        return view('root.activities.index', [
            'activities' => Message::where('type', 'activity')->latest()->paginate(5)
        ]);
    }
}
