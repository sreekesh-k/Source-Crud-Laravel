<?php

namespace App\Http\Controllers;

use App\Models\SourceMember;
use Illuminate\Http\Request;

class SourceMemberController extends Controller
{
    public function index()
    {
        // Fetch all members from the database
        $members = SourceMember::all();

        // Pass the data to the view
        return view('index', compact('members'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        // Validate form input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'email' => 'required|email|unique:source_members,email',
            'des' => 'required|string',
            'img_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('img_url')) {
            $imagePath = $request->file('img_url')->store('images', 'public');
        }

        // Create a new SourceMember
        SourceMember::create([
            'name' => $validated['name'],
            'phone_number' => $validated['phone_number'],
            'email' => $validated['email'],
            'des' => $validated['des'],
            'img_url' => $imagePath ?? null, // Store image path or null if no image
        ]);

        // Redirect to a different page or show a success message
        return redirect()->route('index')->with('success', 'Source Member created successfully!');
    }
}
