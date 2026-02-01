<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountInfoController extends Controller
{
    /**
     * Display the user's account information.
     */
    public function show()
    {
        $user = Auth::user();

        // Dummy favorite items — replace with actual relationship if available
        $favourites = collect([
            (object)[
                'name' => 'Gaming Mouse',
                'category' => 'Accessories'
            ],
            (object)[
                'name' => 'Ultrabook',
                'category' => 'Computers'
            ],
        ]);

        return view('frontend.accountinfo', [
            'user' => $user,
            'favourites' => $favourites,
        ]);
    }
}
