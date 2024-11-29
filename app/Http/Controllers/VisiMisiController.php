<?php

namespace App\Http\Controllers;

use App\Models\VisiMisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VisiMisiController extends Controller
{
    public function index()
    {
        $visiMisis = VisiMisi::all();
        return view('dashboard.visi_misi.index', compact('visiMisis'));
    }

    public function create()
    {
        return view('dashboard.visi_misi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image')->store('visi_misi_images', 'public');

        VisiMisi::create([
            'image' => $imagePath,
        ]);

        return redirect()->route('visi_misis.index')->with('success', 'Image added successfully.');
    }

    public function edit(VisiMisi $visiMisi)
    {
        return view('dashboard.visi_misi.edit', compact('visiMisi'));
    }

    public function update(Request $request, VisiMisi $visiMisi)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($visiMisi->image) {
                Storage::disk('public')->delete($visiMisi->image);
            }

            // Upload new image
            $imagePath = $request->file('image')->store('visi_misi_images', 'public');
            $visiMisi->update(['image' => $imagePath]);
        }

        return redirect()->route('visi_misis.index')->with('success', 'Image updated successfully.');
    }

    public function destroy(VisiMisi $visiMisi)
    {
        // Delete the image from storage
        if ($visiMisi->image) {
            Storage::disk('public')->delete($visiMisi->image);
        }

        $visiMisi->delete();

        return redirect()->route('visi_misis.index')->with('success', 'Image deleted successfully.');
    }
}
