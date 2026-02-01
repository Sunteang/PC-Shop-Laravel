<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GetComputer;

class GetComputerController extends Controller
{

    protected $computer;

    public function __construct()
    {
        $this->computer = new GetComputer();
    }

    public function getcomputer(Request $request)
    {
        $query = GetComputer::query();

        // Search by keyword
        if ($request->has('search') && $request->search !== null) {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        // Filter by category
        if ($request->has('category') && $request->category !== null) {
            $query->where('category', $request->category);
        }

        // Sort
        if ($request->has('sort')) {
            if ($request->sort === 'price_asc') {
                $query->orderBy('price', 'asc');
            } elseif ($request->sort === 'price_desc') {
                $query->orderBy('price', 'desc');
            }
        }

        // Pagination
        $computers = $query->paginate(12); // 12 per page

        // Get distinct categories for filter dropdown
        $categories = GetComputer::select('category')->distinct()->pluck('category');

        return view('frontend.getcomputer', compact('computers', 'categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|unique:computer,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|string',
            'image' => 'nullable|string',
        ]);

        $this->computer->create($validatedData);

        return redirect()->route('computer.getcomputer')->with('success', 'Computer created successfully');
    }

    public function computerdetails($id)
    {
        $computer = GetComputer::findOrFail($id);
        return view('frontend.computerdetails', compact('computer'));
    }
}
