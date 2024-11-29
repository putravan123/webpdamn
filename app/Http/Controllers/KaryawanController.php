<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawans = Karyawan::with('jabatan')->get();
        return view('dashboard.karyawans.index', compact('karyawans'));
    }

    public function create()
    {
        $jabatans = Jabatan::all();
        return view('dashboard.karyawans.create', compact('jabatans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|unique:karyawans,email',
            'nomor_telepon' => 'nullable|string|max:15',
            'jabatan_id' => 'required|exists:jabatans,id',
        ]);

        Karyawan::create($request->all());

        return redirect()->route('karyawans.index')->with('success', 'Karyawan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $karyawan = Karyawan::with('jabatan')->findOrFail($id);
        $jabatans = Jabatan::all();
        return view('dashboard.karyawans.edit', compact('karyawan', 'jabatans'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|unique:karyawans,email,' . $id,
            'nomor_telepon' => 'nullable|string|max:15',
            'jabatan_id' => 'required|exists:jabatans,id',
        ]);

        $karyawan = Karyawan::findOrFail($id);
        $karyawan->update($request->all());

        return redirect()->route('karyawans.index')->with('success', 'Karyawan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->delete();

        return redirect()->route('karyawans.index')->with('success', 'Karyawan berhasil dihapus');
    }
}
