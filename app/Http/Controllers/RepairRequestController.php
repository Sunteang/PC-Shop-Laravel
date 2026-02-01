<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RepairRequest;

class RepairRequestController extends Controller
{
    // Show list of all repair requests (for admin or user if needed)
    public function index()
    {
        $repairRequests = RepairRequest::all();
        return view('admin.repair_request', compact('repairRequests'));
    }


    // Show form to create a new repair request
    public function create()
    {
        return view('repair_requests.create');
    }

    // Store the new repair request in DB
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'device_type' => 'required|string|max:100',
            'issue_description' => 'required|string',
            'photo_path' => 'nullable|string|url', // optional photo upload
            'status' => 'nullable|string|in:pending,in_progress,completed,canceled',
        ]);

        // Handle photo upload if exists
        if ($request->hasFile('photo_path')) {
            $path = $request->file('photo_path')->store('photos', 'public');
            $validatedData['photo_path'] = $path;
        }

        // Default status if not provided
        $validatedData['status'] = $validatedData['status'] ?? 'pending';

        RepairRequest::create($validatedData);

        return redirect()->route('repairrequest.index')->with('success', 'Repair request submitted successfully!');
    }

    // Show details of one repair request
    public function show($id)
    {
        $request = RepairRequest::findOrFail($id);
        return view('repair_requests.show', compact('request'));
    }

    // Optionally, methods for edit/update/destroy if users or admin can manage requests:
    public function edit($id)
    {
        $request = RepairRequest::findOrFail($id);
        return view('repair_requests.edit', compact('request'));
    }

    public function update(Request $request, $id)
    {
        $repairRequest = RepairRequest::findOrFail($id);

        $validatedData = $request->validate([
            'status' => 'required|string|in:pending,in_progress,completed,canceled',
            // add other editable fields if necessary
        ]);

        $repairRequest->update($validatedData);

        return redirect()->route('repairrequest.index')->with('success', 'Request updated.');
    }

    public function destroy($id)
    {
        RepairRequest::findOrFail($id)->delete();

        return redirect()->route('repairrequest.index')->with('success', 'Request deleted.');
    }

    // Method to update the status of a repair request
    public function updateStatus(Request $request, $id)
    {
        $repair = RepairRequest::findOrFail($id);
        $repair->status = $request->status;
        $repair->save();

        return response()->json(['message' => 'Status updated successfully']);
    }
}
