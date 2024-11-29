<?php

namespace App\Http\Controllers;

use App\Models\SambunganLangganan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SambunganLanggananController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        $sambunganLangganans = SambunganLangganan::all();
        return view('dashboard.sambungan_langganans.index', compact('sambunganLangganans'));
    }

    // Show the form for creating a new resource
    public function create()
    {
        return view('dashboard.sambungan_langganans.create');
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $request->validate([
            'imagetabel' => 'nullable|image|max:1024', // For the second image
            'image' => 'nullable|image|max:1024', // For the first image
        ]);

        $sambunganLangganan = new SambunganLangganan();

        // Handle the first image upload (image)
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $sambunganLangganan->image = $imagePath;
        }

        // Handle the second image upload (imagetabel)
        if ($request->hasFile('imagetabel')) {
            $imagetabelPath = $request->file('imagetabel')->store('images', 'public');
            $sambunganLangganan->imagetabel = $imagetabelPath;
        }

        $sambunganLangganan->save();

        return redirect()->route('sambungan_langganans.index')
            ->with('success', 'Sambungan Langganan created successfully.');
    }

    // Display the specified resource
    public function show($id)
    {
        $sambunganLangganan = SambunganLangganan::findOrFail($id);
        return view('sambungan_langganans.show', compact('sambunganLangganan'));
    }

    // Show the form for editing the specified resource
    public function edit($id)
    {
        $sambunganLangganan = SambunganLangganan::findOrFail($id);
        return view('dashboard.sambungan_langganans.edit', compact('sambunganLangganan'));
    }

    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'imagetabel' => 'nullable|image|max:1024', // For the second image
            'image' => 'nullable|image|max:1024', // For the first image
        ]);

        $sambunganLangganan = SambunganLangganan::findOrFail($id);

        // Handle the first image upload (image)
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($sambunganLangganan->image) {
                Storage::delete('public/' . $sambunganLangganan->image);
            }
            $imagePath = $request->file('image')->store('images', 'public');
            $sambunganLangganan->image = $imagePath;
        }

        // Handle the second image upload (imagetabel)
        if ($request->hasFile('imagetabel')) {
            // Delete old image if exists
            if ($sambunganLangganan->imagetabel) {
                Storage::delete('public/' . $sambunganLangganan->imagetabel);
            }
            $imagetabelPath = $request->file('imagetabel')->store('images', 'public');
            $sambunganLangganan->imagetabel = $imagetabelPath;
        }

        $sambunganLangganan->save();

        return redirect()->route('sambungan_langganans.index')
            ->with('success', 'Sambungan Langganan updated successfully.');
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        $sambunganLangganan = SambunganLangganan::findOrFail($id);

        // Delete both images if exist
        if ($sambunganLangganan->image) {
            Storage::delete('public/' . $sambunganLangganan->image);
        }
        if ($sambunganLangganan->imagetabel) {
            Storage::delete('public/' . $sambunganLangganan->imagetabel);
        }

        $sambunganLangganan->delete();

        return redirect()->route('sambungan_langganans.index')
            ->with('success', 'Sambungan Langganan deleted successfully.');
    }
}
