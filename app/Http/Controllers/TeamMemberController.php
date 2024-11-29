<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use Illuminate\Http\Request;

class TeamMemberController extends Controller
{
    public function index()
    {
        $teamMembers = TeamMember::all(); // Get all team members
        return view('dashboard.team.index', compact('teamMembers'));
    }

    public function create()
    {
        return view('dashboard.team.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'image' => 'required|image',
        ]);
    
        $teamMember = new TeamMember();
        $teamMember->name = $request->name;
        $teamMember->title = $request->title;
    
        // Handle the image upload and store it in the 'public' disk
        if ($request->hasFile('image')) {
            $teamMember->image = $request->image->store('team_members', 'public'); // Specify 'public' disk
        }
    
        // Store social media URLs if provided
        $teamMember->facebook = $request->facebook;
        $teamMember->twitter = $request->twitter;
        $teamMember->linkedin = $request->linkedin;
        $teamMember->instagram = $request->instagram;
    
        $teamMember->save();
    
        return redirect()->route('team.index');
    }
    

    public function edit($id)
    {
        $teamMember = TeamMember::findOrFail($id);
        return view('dashboard.team.edit', compact('teamMember'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'image' => 'nullable|image',
        ]);

        $teamMember = TeamMember::findOrFail($id);
        $teamMember->name = $request->name;
        $teamMember->title = $request->title;

        if ($request->hasFile('image')) {
            $teamMember->image = $request->image->store('team_members');
        }

        $teamMember->facebook = $request->facebook;
        $teamMember->twitter = $request->twitter;
        $teamMember->linkedin = $request->linkedin;
        $teamMember->instagram = $request->instagram;
        $teamMember->save();

        return redirect()->route('team.index');
    }

    public function destroy($id)
    {
        $teamMember = TeamMember::findOrFail($id);
        $teamMember->delete();

        return redirect()->back();
    }
}