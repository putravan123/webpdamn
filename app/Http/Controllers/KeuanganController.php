<?php

namespace App\Http\Controllers;

use App\Models\Keuangan;
use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $keuangan = Keuangan::all();
        return view('dashboard.keuangan.index', compact('keuangan'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('dashboard.keuangan.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $keuangan = new Keuangan($request->only('image'));

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
            $keuangan->image = $imageName;
        }

        $keuangan->save();

        return redirect()->route('keuangan.index')
                         ->with('success', 'Keuangan created successfully.');
    }

    // Display the specified resource.
    public function show(Keuangan $keuangan)
    {
        return view('dashboard.keuangan.show', compact('keuangan'));
    }

    // Show the form for editing the specified resource.
    public function edit(Keuangan $keuangan)
    {
        return view('dashboard.keuangan.edit', compact('keuangan'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, Keuangan $keuangan)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $keuangan->fill($request->only('image'));

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
            $keuangan->image = $imageName;
        }

        $keuangan->save();

        return redirect()->route('keuangan.index')
                         ->with('success', 'Keuangan updated successfully.');
    }

    // Remove the specified resource from storage.
    public function destroy(Keuangan $keuangan)
    {
        $keuangan->delete();

        return redirect()->route('keuangan.index')
                         ->with('success', 'Keuangan deleted successfully.');
    }
}
