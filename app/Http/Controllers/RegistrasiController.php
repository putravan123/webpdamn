<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registrasi;
use Carbon\Carbon;

class RegistrasiController extends Controller
{
    /**
     * Tampilkan semua data registrasi.
     */
    public function index()
    {
        $registrasis = Registrasi::all();
        return view('dashboard.registrasis.index', compact('registrasis'));
    }

    /**
     * Tampilkan form untuk menambahkan data baru.
     */
    public function create()
    {
        return view('dashboard.registrasis.create');
    }

    /**
     * Simpan data baru ke dalam database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string',
            'email' => 'required|email|unique:registrasis,email',
            'no_telephone' => 'nullable|numeric',
            'no_ktp' => 'nullable|numeric',
            'content' => 'nullable|string|max:100',
        ]);

        $registrasi = new Registrasi($request->all());
        $registrasi->no_registrasi = mt_rand(1000, 9999); // Nomor registrasi acak
        $registrasi->expired_at = Carbon::now()->addMinutes(15); // Waktu kedaluwarsa
        $registrasi->save();

        return redirect()->route('dashboard.registrasis.index')
                         ->with('success', 'Registrasi berhasil dibuat.');
    }

    public function registrasis(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'nama_lengkap' => 'required|string',
            'email' => 'required|email|unique:registrasis,email',
            'no_telephone' => 'nullable|numeric',
            'no_ktp' => 'nullable|numeric',
            'content' => 'nullable|string|max:100',
        ]);
    
        // Create the new registration
        $registrasi = new Registrasi($request->all());
        $registrasi->no_registrasi = mt_rand(1000, 9999); // Generate a random registration number
        $registrasi->expired_at = Carbon::now()->addMinutes(15); // Set expiration time
        $registrasi->save();
    
        // Delete expired registrations
        Registrasi::where('expired_at', '<', now())->delete();
    
        // Redirect with success message and registration details
        return redirect()->route('registrasis')
                         ->with('success', 'Registrasi berhasil dibuat.')
                         ->with('no_registrasi', $registrasi->no_registrasi)
                         ->with('expired_at', $registrasi->expired_at->format('Y-m-d H:i:s'));
    }
    
    /**
     * Tampilkan detail dari data tertentu.
     */
    public function show($id)
    {
        $registrasi = Registrasi::findOrFail($id);
        return view('dashboard.registrasis.show', compact('registrasi'));
    }

    /**
     * Tampilkan form untuk mengedit data tertentu.
     */
    public function edit($id)
    {
        $registrasi = Registrasi::findOrFail($id);
        return view('dashboard.registrasis.edit', compact('registrasi'));
    }

    /**
     * Perbarui data tertentu dalam database.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lengkap' => 'required|string',
            'email' => 'required|email|unique:registrasis,email,'.$id,
            'no_telephone' => 'nullable|numeric',
            'no_ktp' => 'nullable|numeric',
            'content' => 'nullable|string|max:100',
        ]);

        $registrasi = Registrasi::findOrFail($id);
        $registrasi->update($request->all());

        return redirect()->route('dashboard.registrasis.index')
                         ->with('success', 'Registrasi berhasil diperbarui.');
    }

    /**
     * Hapus data tertentu dari database.
     */
    public function destroy($id)
    {
        $registrasi = Registrasi::findOrFail($id);
        $registrasi->delete();

        return redirect()->route('dashboard.registrasis.index')
                         ->with('success', 'Registrasi berhasil dihapus.');
    }

    /**
     * Bersihkan data yang sudah kedaluwarsa.
     */
    public function cleanExpiredRegistrations()
    {
        $now = Carbon::now();
        $deleted = Registrasi::where('expired_at', '<', $now)->delete();

        return response()->json([
            'message' => "Data registrasi kadaluwarsa yang dihapus: $deleted",
        ]);
    }
}
