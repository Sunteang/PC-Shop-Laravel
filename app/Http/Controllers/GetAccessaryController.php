<?php

namespace App\Http\Controllers;

use App\Models\GetAccessary;
use Illuminate\Http\Request;

class GetAccessaryController extends Controller
{
    protected $accessary;

    public function __construct()
    {
        $this->accessary = new GetAccessary();
    }

    public function getaccessary(Request $request)
    {
        $query = $this->accessary->newQuery();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('sort')) {
            if ($request->sort == 'price_asc') {
                $query->orderBy('price', 'asc');
            } elseif ($request->sort == 'price_desc') {
                $query->orderBy('price', 'desc');
            }
        }

        // Paginate results or use get() if you want all
        $response['accessary'] = $query->paginate(12);

        // Define categories here for demo (you can also fetch distinct categories from DB)
        $response['categories'] = ['Mouse', 'Keyboard', 'Monitor', 'Headphones'];

        return view('frontend.getaccessary')->with($response);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|unique:accessary,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|string',
            'image' => 'nullable|string',
        ]);

        $this->accessary->create($validatedData);

        return redirect()->route('accessary.getaccessary')->with('success', 'accessary created successfully');
    }

    public function accessarydetails($id)
    {
        $accessary = GetAccessary::findOrFail($id);
        return view('frontend.accessarydetails', compact('accessary'));
    }
}
