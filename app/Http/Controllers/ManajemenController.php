<?php

namespace App\Http\Controllers;

use App\Models\Manajemen;
use Illuminate\Http\Request;

class ManajemenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $manajemen = Manajemen::all();
        return view('dashboard.manajemen.index', compact('manajemen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.manajemen.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $manajemen = new Manajemen($request->only('image'));

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
            $manajemen->image = $imageName;
        }

        $manajemen->save();

        return redirect()->route('manajemen.index')
                         ->with('success', 'Manajemen created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Manajemen $manajemen)
    {
        return view('dashboard.manajemen.show', compact('manajemen'));
    }

    public function edit(Manajemen $manajeman)
    {
        return view('dashboard.manajemen.edit', compact('manajeman'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Manajemen $manajemen)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $manajemen->fill($request->only('image'));

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
            $manajemen->image = $imageName;
        }

        $manajemen->save();

        return redirect()->route('manajemen.index')
                         ->with('success', 'Manajemen updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $manajemen = Manajemen::findOrFail($id);
        $manajemen->delete();

        return redirect()->route('manajemen.index')
                         ->with('success', 'Manajemen deleted successfully.');
    }
}
