<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function login ()
    {   
        // User::query()->create([
        //     'name' => 'Admin',
        //     'email' => 'admin@mail.com',
        //     'password' => '123',
        // ]);
        return view('user.login');
    }

    public function authenticate(Request $request)
    {
    $validated = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($validated)) {
        return redirect()->route('admin.main.index');
    }

    return redirect()->back()->with('error', 'Incorrect email/password');
    }
}
