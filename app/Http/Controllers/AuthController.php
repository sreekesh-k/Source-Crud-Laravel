<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    
    public function showLoginForm()
    {
        return view('login'); // Returns the login form view
    }

    // Handle login form submission
    public function login(Request $request)
    {
        // Validate the incoming request
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log the user in
        if (Auth::attempt($credentials)) {
            // Authentication passed
            return redirect()->intended('/index');  // Redirect to dashboard or the intended page
        }

        // Authentication failed
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // Show registration form
    public function showRegistrationForm()
    {
        return view('register');  // Returns the registration form view
    }

    // Handle registration form submission
    public function register(Request $request)
    {
        // Validate the registration data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',  // Confirm password
        ]);
    
        // Create the user in the database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),  // Hash the password
        ]);
    
        // Log the user in immediately after registration
        Auth::attempt($request->only('email', 'password'));
    
        // Redirect to the login page after successful registration
        return redirect()->route('login')->with('success', 'Registration successful! Please log in.');
    }
}
