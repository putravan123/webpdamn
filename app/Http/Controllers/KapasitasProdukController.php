<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KapasitasProduk;
use Illuminate\Support\Facades\Storage;

class KapasitasProdukController extends Controller
{
    // Menampilkan daftar mata air
    public function index()
    {
        $kapasitasProduk = KapasitasProduk::all(); 
        return view('dashboard.Kapasitas_produk.index', compact('kapasitasProduk'));
    }

    // Menampilkan form untuk membuat mata air baru
    public function create()
    {
        return view('dashboard.Kapasitas_produk.create');
    }

    // Menyimpan data mata air baru
    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        // Upload gambar "image" jika ada
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }
    
        // Simpan data mata air
        KapasitasProduk::create([
            'image' => $imagePath,
        ]);
    
        return redirect()->route('kapasitas-produk.index')
                         ->with('success', 'Mata Air created successfully.');
    }
    

    // Menampilkan detail mata air
    public function show($id)
    {
        $kapasitasProduk = KapasitasProduk::findOrFail($id);
        return view('kapasitas-produk.show', compact('kapasitasProduk'));
    }

    // Menampilkan form untuk mengedit mata air
    public function edit($id)
    {
        $kapasitasProduk = KapasitasProduk::findOrFail($id);
        return view('dashboard.Kapasitas_produk.edit', compact('kapasitasProduk'));
    }

    // Memperbarui data mata air
// Memperbarui data mata air
public function update(Request $request, $id)
{
    // Validasi data input
    $request->validate([
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $kapasitasProduk = KapasitasProduk::findOrFail($id);

    // Cek jika ada gambar baru
    if ($request->hasFile('image')) {
        // Hapus gambar lama jika ada
        if ($kapasitasProduk->image) {
            Storage::delete('public/' . $kapasitasProduk->image);
        }
        // Upload gambar baru
        $imagePath = $request->file('image')->store('images', 'public');
        $kapasitasProduk->image = $imagePath;
    }

    // Perbarui data mata air
    $kapasitasProduk->update([
        'image' => $imagePath,
    ]);

    return redirect()->route('kapasitas-produk.index')
                     ->with('success', 'Mata Air updated successfully.');
}


    // Menghapus data mata air
    public function destroy($id)
    {
        $kapasitasProduk = KapasitasProduk::findOrFail($id);

        // Hapus gambar jika ada
        if ($kapasitasProduk->image) {
            Storage::delete('public/' . $kapasitasProduk->image);
        }

        // Hapus data mata air
        $kapasitasProduk->delete();

        return redirect()->route('kapasitas-produk.index')
                         ->with('success', 'Mata Air deleted successfully.');
    }
}
