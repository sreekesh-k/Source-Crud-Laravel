<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
{
    return view('login');
}

public function loginPost(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::guard('web')->attempt($credentials)) {
            return redirect('/create')->with('success', 'Login Success');
        }

        return back()->with('error', 'Invalid Email or Password');
    }

    public function logout()
{
    Auth::logout();

    return redirect()->route('login');
}
}
