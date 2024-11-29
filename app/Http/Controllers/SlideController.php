<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
{
    public function index()
    {
        $slides = Slide::all();
        return view('dashboard.slides.index', compact('slides'));
    }

    public function create()
    {
        return view('dashboard.slides.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imagePath = $request->file('image')->store('slides', 'public');

        Slide::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('slides.index')->with('success', 'Slide berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $slide = Slide::find($id);
        return view('dashboard.slides.edit', compact('slide'));
    }

    public function update(Request $request, Slide $slide, )
    {
        $request->validate([
            'title' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($slide->image);
            $imagePath = $request->file('image')->store('slides', 'public');
        } else {
            $imagePath = $slide->image;
        }

        $slide->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('slides.index')->with('success', 'Slide berhasil diupdate.');
    }

    public function destroy(Slide $slide)
    {
        Storage::disk('public')->delete($slide->image);

        $slide->delete();

        return redirect()->route('slides.index')->with('success', 'Slide berhasil dihapus.');
    }
}
