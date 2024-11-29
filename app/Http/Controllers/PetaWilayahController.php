<?php

namespace App\Http\Controllers;

use App\Models\PetaWilayah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PetaWilayahController extends Controller
{
    public function index()
    {
        $petaWilayahs = PetaWilayah::all();
        return view('dashboard.peta_wilayah.index', compact('petaWilayahs'));
    }

    public function create()
    {
        return view('dashboard.peta_wilayah.create');
    }

    public function add_peta()
    {
        return view('dashboard.peta_wilayah.add_peta');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'string|max:255',
            'content' => 'string',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        PetaWilayah::create([
            'image' => $imagePath,
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('peta_wilayahs.index')->with('success', 'Peta Wilayah created successfully.');
    }

    public function edit(PetaWilayah $petaWilayah)
    {
        return view('dashboard.peta_wilayah.edit', compact('petaWilayah'));
    }

    public function update(Request $request, PetaWilayah $petaWilayah)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'string|max:255',
            'content' => '',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($petaWilayah->image);
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $petaWilayah->update($data);

        return redirect()->route('peta_wilayahs.index')->with('success', 'Peta Wilayah updated successfully.');
    }

    public function destroy($id)
    {
        $petaWilayah = PetaWilayah::findOrFail($id);
        Storage::disk('public')->delete($petaWilayah->image);
        $petaWilayah->delete();
        return redirect()->route('peta_wilayahs.index')->with('success', 'Peta Wilayah deleted successfully.');
    }
}
