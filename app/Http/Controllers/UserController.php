<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function profile()
    {
        return view('profile');
    }

    public function updateProfile(Request $request)
    {
        $id = Auth()->user()->id;

        $rules = [
            'name' => 'required|max:255',
            'phone' => 'required',
            'address' => 'required|max:255'
        ];
        $validatedData = $request->validate($rules);
        $validatedData['updated_at'] = now();

        $messageData['message'] = 'telah mengubah data profil';
        $messageData['type'] = 'changelog';
        $messageData['page'] = 'profile';
        $messageData['user_id'] = Auth()->user()->id;
        $messageData['updated_at'] = now();

        User::where('id', $id)->update($validatedData);

        Message::create($messageData);

        return redirect('/dashboard')->with('updateProfile', 'Profile has been updated');
    }

    public function password()
    {
        return view('password');
    }

    public function updatePassword(Request $request)
    {
        $id = Auth()->user()->id;
        $password = Auth()->user()->password;

        if (!Hash::check($request->oldPassword, $password)) {
            return redirect('/password')->with('wrongPassword', 'Old password doesnt match');
        }

        if ($request->password != $request->confirmPassword) {
            return redirect('/password')->with('confirmPassword', 'Confirm password doesnt match');
        }

        $validatedData = $request->validate([
            'password' => 'required|max:255'
        ]);

        $validatedData['password'] = Hash::make($request->password);
        $validatedData['updated_at'] = now();

        $messageData['message'] = 'telah mengubah data password';
        $messageData['type'] = 'changelog';
        $messageData['page'] = 'password';
        $messageData['user_id'] = Auth()->user()->id;
        $messageData['updated_at'] = now();

        User::where('id', $id)->update($validatedData);

        Message::create($messageData);

        return redirect('/dashboard')->with('updatePassword', 'Password has been updated');
    }
}
