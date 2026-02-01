<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class UserLoginController
{
    public function index()
    {
        return view('user.login');
    }
    public function check(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required',],
            'password' => ['required'],
        ]);

        if (Auth::attempt(array_merge($credentials, ['role' => 'user']))) {
            // return redirect()->intended('user/dashboard');
            return redirect()->intended('/home')->with('success', 'Login successful');
        }
        return redirect()->back()->withErrors(['email' => 'User credentials are incorrect']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $response = redirect('/home');

        // Explicitly clear important cookies for user session
        $cookiesToClear = ['laravel_session', 'XSRF-TOKEN'];
        foreach ($cookiesToClear as $cookie) {
            $response->withCookie(Cookie::forget($cookie));
        }

        return $response;
    }
}
