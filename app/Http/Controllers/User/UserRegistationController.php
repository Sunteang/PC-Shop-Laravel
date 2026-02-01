<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserRegistationController
{
    public function create()
    {
        return view('user.create');
    }
    public function store(Request $request)
    {
        $input = $request->all();
        User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'password' => Hash::make($input['password']),
            'address' => 'nullable|string|max:255',
            'profile_image' => 'nullable|url|max:255',

        ]);
        return view('user.login');
    }
}
