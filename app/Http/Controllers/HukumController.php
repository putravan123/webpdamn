<?php

namespace App\Http\Controllers;

use App\Models\Hukum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HukumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hukums = Hukum::latest()->paginate(10); // Pagination
        return view('dashboard.hukum.index', compact('hukums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.hukum.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        // Proses upload gambar
        $image = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('hukums', 'public'); // Simpan di storage/app/public/hukums
        }

        // Simpan data ke database
        Hukum::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $image,
        ]);

        return redirect()->route('hukum.index')->with('success', 'Hukum berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hukum $hukum)
    {
        return view('dashboard.hukum.show', compact('hukum'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hukum $hukum)
    {
        return view('dashboard.hukum.edit', compact('hukum'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hukum $hukum)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        // Cek apakah ada file baru yang di-upload
        $image = $hukum->image;
        if ($request->hasFile('image')) {
            if ($image) {
                // Hapus gambar lama
                Storage::delete('public/' . $image);
            }
            $image = $request->file('image')->store('hukums', 'public'); // Upload gambar baru
        }

        // Update data di database
        $hukum->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $image,
        ]);

        return redirect()->route('hukum.index')->with('success', 'Hukum berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hukum $hukum)
    {
        // Hapus gambar jika ada
        if ($hukum->image) {
            Storage::delete('public/' . $hukum->image);
        }

        // Hapus data dari database
        $hukum->delete();

        return redirect()->route('hukum.index')->with('success', 'Hukum berhasil dihapus.');
    }
}
