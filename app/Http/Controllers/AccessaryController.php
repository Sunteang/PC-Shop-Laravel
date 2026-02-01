<?php

namespace App\Http\Controllers;

use App\Models\Accessary;
use Illuminate\Http\Request;

use App\Models\Computer;
use App\Models\RepairRequest;

class AccessaryController extends Controller
{

    protected $accessary;

    public function __construct()
    {
        $this->accessary = new Accessary();
    }

    public function index()
    {
        $response['accessary'] = $this->accessary->all();
        $response['totalComputers'] = Computer::count();
        $response['totalServices'] = RepairRequest::count();

        return view('admin.accessary')->with($response);
    }

    // search
    public function search(Request $request)
    {
        $search = $request->input('search');

        if (empty($search)) {
            return redirect('dashboard-admin/accessary');
        }

        $accessary = Accessary::where('name', 'like', '%' . $search . '%')->get();

        return view('admin.accessary', [
            'accessary' => $accessary,
            'totalComputers' => Computer::count(),
            'totalServices' => RepairRequest::count(),
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:tblaccessary,name',
            'description' => 'nullable|string',
            'category' => 'required|string|in:Mouse,Keyboard,Power Adapter,USB,MousePad,Other',
            'price' => 'required|string',
            'image' => 'nullable|string',
        ]);

        $this->accessary->create($validatedData);

        return redirect('/dashboard-admin/accessary');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $accessary = Accessary::findOrFail($id);
        return view('accessary.show', ['accessary' => $accessary]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $response['accessary'] = $this->accessary->find($id);
        return view('admin.accessaryedit')->with($response);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $accessary = $this->accessary->find($id);

        $accessary->update(array_merge($accessary->toArray(), $request->toArray()));
        return redirect('dashboard-admin/accessary');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $accessary = $this->accessary->find($id);

        $accessary->delete();
        return redirect('/dashboard-admin/accessary');
    }
    /**
     * Check if an accessary name already exists.
     */
    public function checkName(Request $request)
    {
        $name = $request->query('name');

        $exists = Accessary::where('name', $name)->exists();

        return response()->json(['exists' => $exists]);
    }
}
