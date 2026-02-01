<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Ensure you import the User model if needed

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     */
    public function edit()
    {
        $user = Auth::user();
        return view('frontend.edit_account_info', compact('user'));
    }

    /**
     * Update the profile information.
     */
    public function update(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:tbluser,email,' . Auth::id(),
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'profile_image' => 'nullable|url|max:255',
        ]);

        User::where('id', Auth::id())->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'profile_image' => $request->filled('profile_image') ? $request->input('profile_image') : null,
        ]);

        return redirect('/account-info')->with('success', 'Profile updated successfully.');
    }
}
