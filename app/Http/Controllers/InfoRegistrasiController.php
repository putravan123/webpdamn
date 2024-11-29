<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InfoRegistrasi;
use App\Models\Registrasi;
use Carbon\Carbon;

class InfoRegistrasiController extends Controller
{
    public function index()
    {
        $infoRegistrasis = InfoRegistrasi::all();
        return view('dashboard.info_registrasis.index', compact('infoRegistrasis'));
    }

    public function create()
    {
        return view('dashboard.info_registrasis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_registrasi' => 'required|integer',
        ]);

        $registrasiExists = Registrasi::where('no_registrasi', $request->no_registrasi)->exists();

        if (!$registrasiExists) {
            return redirect()->back()->withErrors(['no_registrasi' => 'Maaf, no_registrasi kamu tidak ada.']);
        }

        InfoRegistrasi::create($request->all());
        return redirect()->route('info_registrasis.index')
                         ->with('success', 'Info Registrasi created successfully.');
    }
    public function cek_registrasi(Request $request)
    {
        $request->validate([
            'no_registrasi' => 'required|integer',
        ]);

        // Cari nomor registrasi yang belum kadaluarsa
        $registrasi = Registrasi::where('no_registrasi', $request->no_registrasi)
            ->where('expired_at', '>', Carbon::now()) // Pastikan belum kadaluarsa
            ->first();

        if (!$registrasi) {
            return redirect()->back()->withErrors(['no_registrasi' => 'Nomor registrasi tidak valid atau sudah kadaluarsa.']);
        }

        // Simpan informasi registrasi jika nomor valid
        InfoRegistrasi::create($request->all());

        return redirect()->route('info_registrasis.index')
                        ->with('success', 'Info Registrasi created successfully.');
    }


    public function show($id)
    {
        $infoRegistrasi = InfoRegistrasi::findOrFail($id);
        return view('dashboard.info_registrasis.show', compact('infoRegistrasi'));
    }

    public function edit($id)
    {
        $infoRegistrasi = InfoRegistrasi::findOrFail($id);
        return view('dashboard.info_registrasis.edit', compact('infoRegistrasi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'no_registrasi' => 'required|integer',
        ]);

        $registrasiExists = Registrasi::where('no_registrasi', $request->no_registrasi)->exists();

        if (!$registrasiExists) {
            return redirect()->back()->withErrors(['no_registrasi' => 'Maaf, no_registrasi kamu tidak ada.']);
        }

        $infoRegistrasi = InfoRegistrasi::findOrFail($id);
        $infoRegistrasi->update($request->all());

        return redirect()->route('info_registrasis.index')
                         ->with('success', 'Info Registrasi updated successfully.');
    }

    public function destroy($id)
    {
        $infoRegistrasi = InfoRegistrasi::findOrFail($id);
        $infoRegistrasi->delete();

        return redirect()->route('info_registrasis.index')
                         ->with('success', 'Info Registrasi deleted successfully.');
    }
}
