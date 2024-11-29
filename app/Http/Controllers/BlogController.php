<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('dashboard.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('dashboard.blogs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|image',
            'publish_date' => 'required|date',
        ]);
    
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('images', 'public');
        } else {
            $image = null;
        }
    
        Blog::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $image,
            'publish_date' => $request->publish_date,
        ]);
    
        return redirect()->route('blogs.index')->with('success', 'Blog created successfully.');
    }
    

    public function show(Blog $blog)
    {
        return view('dasboard.blogs.show', compact('blog'));
    }

    public function edit(Blog $blog)
    {
        return view('dashboard.blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|image',
            'publish_date' => 'required|date',
        ]);
    
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('images', 'public');
        } else {
            $image = $blog->image;
        }
    
        $blog->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $image,
            'publish_date' => $request->publish_date,
        ]);
    
        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully.');
    }
    

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully.');
    }
}

