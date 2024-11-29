<?php

namespace App\Http\Controllers;

use App\Models\CoreValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CoreValueController extends Controller
{
    public function index()
    {
        $coreValue = CoreValue::all();
        return view('dashboard.core_values.index', compact('coreValue'));
    }

    public function create()
    {
        return view('dashboard.core_values.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg',
        ]);

        $image = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('coreValue', 'public');
        }

        CoreValue::create([
            'image' => $image,
        ]);

        return redirect()->route('core-value.index')
                         ->with('success', 'Tentang PDAM created successfully.');
    }

    public function show($id)
    {
        $coreValue = CoreValue::findOrFail($id);
        return view('dashboard.tentang_pdams.show', compact('coleValue'));
    }

    public function edit($id)
    {
        $coreValue = CoreValue::findOrFail($id);
        return view('dashboard.core_values.edit', compact('coreValue'));
    }

    public function update(Request $request, $id)
    {
        $coreValue = CoreValue::findOrFail($id);

        $request->validate([
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $image = $coreValue->image;
        if ($request->hasFile('image')) {
            if ($image) {
                Storage::delete('public/' . $image);
            }
            $image = $request->file('image')->store('coreValue', 'public');
        }

        $coreValue->update([
            'image' => $image,
        ]);

        return redirect()->route('core-value.index')
                         ->with('success', 'Tentang PDAM updated successfully.');
    }

    public function destroy($id)
    {
        $coreValue = CoreValue::findOrFail($id);

        if ($coreValue->image) {
            Storage::delete('public/' . $coreValue->image);
        }

        $coreValue->delete();

        return redirect()->route('core-value.index')
                         ->with('success', 'Tentang PDAM deleted successfully.');
    }
}
