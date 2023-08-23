<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:6|max:255',
            'phone' => 'required',
            'address' => 'required|max:255'
        ]);

        $validatedData['status'] = 'pending';
        $validatedData['is_admin'] = 0;

        User::create($validatedData);

        return redirect('/')->with('success', 'Registration succesful! Please login');
    }
}
