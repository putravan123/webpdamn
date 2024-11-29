<?php

namespace App\Http\Controllers;

use App\Models\Struktur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StrukturController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $strukturs = Struktur::all();
        return view('dashboard.strukturs.index', compact('strukturs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.strukturs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|image',
        ]);
    
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('hukum', 'public');
        } else {
            $image = null;
        }
    
        Struktur::create([
            'title' => $request->title,
            'image' => $image,
        ]);
    
        return redirect()->route('strukturs.index')->with('success', 'Struktur created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Struktur $struktur)
    {
        return view('dashboard.strukturs.show', compact('struktur'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Struktur $struktur)
    {
        return view('dashboard.strukturs.edit', compact('struktur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Struktur $struktur)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|image',
        ]);
        
        if ($request->hasFile('image')) {
            if ($struktur->image) {
                Storage::disk('public')->delete($struktur->image);
            }
            $image = $request->file('image')->store('hukum', 'public');
        } else {
            $image = $struktur->image;
        }

        $struktur->update([
            'title' => $request->title,
            'image' => $image,
        ]);

        return redirect()->route('strukturs.index')->with('success', 'Struktur updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Struktur $struktur)
    {
        if ($struktur->image) {
            Storage::disk('public')->delete($struktur->image);
        }

        $struktur->delete();

        return redirect()->route('strukturs.index')->with('success', 'Struktur deleted successfully.');
    }
}
