<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required|min:6'
        ]);

        if (Auth::attempt($credentials)) {
            if (Auth()->user()->status == 'activated') {
                $request->session()->regenerate();

                $messageData['message'] = 'Telah berhasil login';
                $messageData['type'] = 'changelog';
                $messageData['page'] = 'dashboard';
                $messageData['user_id'] = Auth()->user()->id;
                $messageData['updated_at'] = now();

                if (Auth()->User()->is_admin == 0) {
                    Message::create($messageData);
                }

                return redirect()->intended('dashboard');
            } elseif ((Auth()->user()->status == 'deactivated')) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return back()->with('loginFailed', 'Account is deactivated! Please contact Admin');
            } else {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return back()->with('loginPending', 'Pending verification! Please contact Admin');
            }
        }

        return back()->with('loginError', 'Email or Password is incorrect!');
    }

    public function logout(Request $request)
    {
        $id = Auth()->user()->id;

        $messageData['message'] = 'Telah berhasil logout';
        $messageData['type'] = 'changelog';
        $messageData['page'] = 'dashboard';
        $messageData['user_id'] = $id;
        $messageData['updated_at'] = now();

        if (Auth()->User()->is_admin == 0) {
            Message::create($messageData);
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();


        return redirect('/');
    }
}

    // public function logout(Request $request)
    // {
    //     Auth::logout();
    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();


    //     return redirect('/login');
    // }