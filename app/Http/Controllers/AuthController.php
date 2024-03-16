<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm() {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        // print_r($credentials);
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/admin_dashboard'); // Redirect to dashboard upon successful login
        }

        return redirect()->back()->withInput()->withErrors(['email' => 'Invalid email or password']); // Redirect back with error
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Log the user out
        return redirect()->route('login'); // Redirect to the login page
    }
}
