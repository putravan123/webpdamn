<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InfoTagihan;

class InfoTagihanController extends Controller
{
    public function index()
    {
        $infoTagihans = InfoTagihan::all();
        return view('dashboard.info_tagihans.index', compact('infoTagihans'));
    }

    public function create()
    {
        return view('dashboard.info_tagihans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tagihan' => 'required|integer',
        ]);

        InfoTagihan::create($request->all());
        return redirect()->route('info_tagihans.index')
                         ->with('success', 'Info Tagihan created successfully.');
    }

    public function show($id)
    {
        $infoTagihan = InfoTagihan::findOrFail($id);
        return view('dashboard.info_tagihans.show', compact('infoTagihan'));
    }

    public function edit($id)
    {
        $infoTagihan = InfoTagihan::findOrFail($id);
        return view('dashboard.info_tagihans.edit', compact('infoTagihan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tagihan' => 'required|integer',
        ]);

        $infoTagihan = InfoTagihan::findOrFail($id);
        $infoTagihan->update($request->all());

        return redirect()->route('info_tagihans.index')
                         ->with('success', 'Info Tagihan updated successfully.');
    }

    public function destroy($id)
    {
        $infoTagihan = InfoTagihan::findOrFail($id);
        $infoTagihan->delete();

        return redirect()->route('info_tagihans.index')
                         ->with('success', 'Info Tagihan deleted successfully.');
    }
}
