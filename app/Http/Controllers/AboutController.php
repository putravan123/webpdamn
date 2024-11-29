<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::all();
        return view('dashboard.abouts.index', compact('abouts'));
    }

    public function create()
    {
        return view('dashboard.abouts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate for image
        ]);

        // Store the image
        $imagePath = $request->file('icon')->store('icons', 'public');

        // Create the About entry with the image path
        About::create([
            'title' => $request->title,
            'description' => $request->description,
            'icon' => $imagePath,
        ]);

        return redirect()->route('abouts.index')->with('success', 'About created successfully.');
    }

    public function edit(About $about)
    {
        return view('dashboard.abouts.edit', compact('about'));
    }

    public function update(Request $request, About $about)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate for image
        ]);

        // Update the About entry
        $about->title = $request->title;
        $about->description = $request->description;

        // If a new image is uploaded, store it and update the path
        if ($request->hasFile('icon')) {
            // Delete the old image if it exists
            if ($about->icon) {
                Storage::disk('public')->delete($about->icon);
            }

            $imagePath = $request->file('icon')->store('icons', 'public');
            $about->icon = $imagePath;
        }

        $about->save();

        return redirect()->route('abouts.index')->with('success', 'About updated successfully.');
    }

    public function destroy(About $about)
    {
        // Delete the image from storage
        if ($about->icon) {
            Storage::disk('public')->delete($about->icon);
        }

        $about->delete();
        return redirect()->route('abouts.index')->with('success', 'About deleted successfully.');
    }
}
