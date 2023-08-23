<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('root.user.index', [
            'users' => User::where('status', 'activated')
                ->where('is_admin', 0)
                ->get()
        ]);
    }

    public function pending()
    {
        return view('root.user.pending', [
            'users' => User::where('status', 'deactivated')
                ->orWhere('status', 'pending')
                ->get()
        ]);
    }

    public function activated(User $user)
    {
        $validatedData['status'] = 'activated';
        $validatedData['updated_at'] = now();

        $messageData['message'] = 'telah diaktifkan';
        $messageData['type'] = 'changelog';
        $messageData['page'] = 'users';
        $messageData['user_id'] = $user->id;
        $messageData['updated_at'] = now();

        User::where('id', $user->id)
            ->update($validatedData);

        Message::create($messageData);

        return redirect('/users')->with('activated', 'User has been activated');
    }

    public function deactivated(User $user)
    {
        $validatedData['status'] = 'deactivated';
        $validatedData['updated_at'] = now();

        $messageData['message'] = 'telah dinonaktifkan';
        $messageData['type'] = 'changelog';
        $messageData['page'] = 'pending';
        $messageData['user_id'] = $user->id;
        $messageData['updated_at'] = now();

        User::where('id', $user->id)
            ->update($validatedData);

        Message::create($messageData);

        return redirect('/pending')->with('deactivated', 'User has been deactivated');
    }
}
