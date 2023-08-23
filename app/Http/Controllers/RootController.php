<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RootController extends Controller
{
    public function activities()
    {
        return view('root.activities.index');
    }

    public function changelog()
    {
        return view('root.changelog.index');
    }
}
