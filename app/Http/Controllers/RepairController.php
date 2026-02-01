<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RepairRequest;

class RepairController extends Controller
{
    public function showBookingForm()
    {
        return view('frontend.booking');
    }

    public function submitBooking(Request $request)
    {
        // Validation
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'device_type' => 'required',
            'issue_description' => 'required',
            'photo' => 'nullable|string|url',
        ]);

        // Use the photo URL directly
        $photoPath = $request->photo;

        // Store in database
        RepairRequest::create([
            'name' => $request->name,
            'email' => $request->email,
            'device_type' => $request->device_type,
            'issue_description' => $request->issue_description,
            'photo_path' => $photoPath,
            'status' => 'pending',
        ]);

        return redirect('repairservice')->with('success', 'Thank you! Your booking has been submitted.');
    }



    public function showTrackForm()
    {
        return view('frontend.track');
    }

    public function trackRepair(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $repair = RepairRequest::where('email', $request->email)->latest()->first();

        if ($repair) {
            return back()->with('status', $repair->status);
        } else {
            return back()->with('not_found', 'No repair found for this email.');
        }
    }
}
