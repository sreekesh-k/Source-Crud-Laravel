<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Http\Request;
use App\Models\Sourcemembers;
use Illuminate\Support\Facades\Storage;  // For image storage

class CreateController extends Controller
{
    public function createMembers()
    {
        return view('create');
    }

    public function addMembers(Request $request)
{
    // Validate the input data, including the email field
    $data = $request->validate([
        'name' => 'required',
        'email' => 'required|email', // Make sure to validate email properly
        'phone' => 'required|numeric',
        'description' => 'required',
        'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
    ]);

    // Handle the image upload
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');
    } else {
        $imagePath = null;
    }

    // Save the new member
    Sourcemembers::create([
        'name' => $data['name'],
        'email' => $data['email'],  // Add email to the insert statement
        'phone' => $data['phone'],
        'description' => $data['description'],
        'image' => $imagePath,
    ]);

    return redirect()->back()->with('success', 'Member added successfully');
}


}
