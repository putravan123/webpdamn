<?php

namespace App\Http\Controllers;

use App\Models\Pelayanan;
use Illuminate\Http\Request;

class PelayananController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $pelayanans = Pelayanan::all();
        return view('dashboard.pelayanans.index', compact('pelayanans'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('dashboard.pelayanans.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $pelayanan = new Pelayanan($request->only('image'));

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
            $pelayanan->image = $imageName;
        }

        $pelayanan->save();

        return redirect()->route('pelayanans.index')
                         ->with('success', 'Pelayanan created successfully.');
    }

    // Display the specified resource.
    public function show(Pelayanan $pelayanan)
    {
        return view('dashboard.pelayanans.show', compact('pelayanan'));
    }

    // Show the form for editing the specified resource.
    public function edit(Pelayanan $pelayanan)
    {
        return view('dashboard.pelayanans.edit', compact('pelayanan'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, Pelayanan $pelayanan)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $pelayanan->fill($request->only('image'));

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
            $pelayanan->image = $imageName;
        }

        $pelayanan->save();

        return redirect()->route('pelayanans.index')
                         ->with('success', 'Pelayanan updated successfully.');
    }

    // Remove the specified resource from storage.
    public function destroy(Pelayanan $pelayanan)
    {
        $pelayanan->delete();

        return redirect()->route('pelayanans.index')
                         ->with('success', 'Pelayanan deleted successfully.');
    }
}
