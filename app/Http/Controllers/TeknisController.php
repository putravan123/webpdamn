<?php

namespace App\Http\Controllers;

use App\Models\Teknis;
use Illuminate\Http\Request;

class TeknisController extends Controller
{
    public function index()
    {
        $teknis = Teknis::all();
        return view('dashboard.teknis.index', compact('teknis'));
    }

    public function create()
    {
        return view('dashboard.teknis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $teknis = new Teknis($request->only('image'));

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
            $teknis->image = $imageName;
        }

        $teknis->save();

        return redirect()->route('tekniss.index')
                         ->with('success', 'Teknis created successfully.');
    }

    public function show(Teknis $tekniss)
    {
        return view('dashboard.teknis.show', compact('teknis'));
    }

    public function edit(Teknis $tekniss)
    {
        return view('dashboard.teknis.edit', compact('tekniss'));
    }

    public function update(Request $request, Teknis $tekniss)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $tekniss->fill($request->only('image'));

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
            $tekniss->image = $imageName;
        }

        $tekniss->save();

        return redirect()->route('tekniss.index')
                         ->with('success', 'Teknis updated successfully.');
    }

    public function destroy(Teknis $teknis)
    {
        $teknis->delete();

        return redirect()->route('teknis.index')
                         ->with('success', 'Teknis deleted successfully.');
    }
}
