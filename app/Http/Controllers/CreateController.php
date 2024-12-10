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


public function view()
{
    $sourcemembers = Sourcemembers::all();  // Fetch all sourcemembers
    return view('viewmembers', ['sourcemembers' => $sourcemembers]);  // Pass the correct variable to the view
}


public function edit(Sourcemembers $member)
{
        return view('edit',['member'=>$member]);
}
public function editpost(Request $request, Sourcemembers $member)
{
    $data = $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required|numeric',
        'description' => 'required',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Image is optional during update
    ]);

    // Update the member's information
    $member->update([
        'name' => $data['name'],
        'email' => $data['email'],
        'phone' => $data['phone'],
        'description' => $data['description'],
    ]);

    // Handle image upload if provided
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public'); // Store the image in 'images' folder
        $member->update(['image' => $imagePath]); // Update the image field
    }

    // Redirect with a success message
    return redirect()->route('list')->with('success', 'Member updated successfully.');
}

public function Destroy(Sourcemembers $member)
{
    $member->delete();
    return redirect(route('list'));
}


}
