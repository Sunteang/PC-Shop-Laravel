<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computer;

class ComputerController extends Controller
{
    protected $computer;

    public function __construct()
    {
        $this->computer = new Computer();
    }

    public function index()
    {
        $computers = $this->computer->all();
        return view('frontend', compact('computers'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $computers = Computer::where('name', 'like', "%{$search}%")
            ->orWhere('description', 'like', "%{$search}%")
            ->get();

        if ($request->ajax()) {
            return view('frontend.getcomputer', compact('computers'))->render();
        }

        return view('frontend.getcomputer', compact('computers'));
    }

    // Other methods like create, store, show, edit, update, destroy...
}
