<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index()
    {
        $jabatans = Jabatan::all();
        return view('dashboard.jabatans.index', compact('jabatans'));
    }

    public function create()
    {
        return view('dashboard.jabatans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_jabatan' => 'required|string|max:255|unique:jabatans,nama_jabatan',
        ]);

        Jabatan::create($request->all());

        return redirect()->route('jabatans.index')->with('success', 'Jabatan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $jabatan = Jabatan::findOrFail($id);
        return view('dashboard.jabatans.edit', compact('jabatan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_jabatan' => 'required|string|max:255|unique:jabatans,nama_jabatan,' . $id,
        ]);

        $jabatan = Jabatan::findOrFail($id);
        $jabatan->update($request->all());

        return redirect()->route('jabatans.index')->with('success', 'Jabatan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $jabatan = Jabatan::findOrFail($id);
        $jabatan->delete();

        return redirect()->route('jabatans.index')->with('success', 'Jabatan berhasil dihapus');
    }
}

