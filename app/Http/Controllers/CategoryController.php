<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function read()
    {
        $categories = Category::all();
        return view('index', ['categories' => $categories]);
    }

    public function create()
    {
        return view('create');
    }

    public function createConfirm(Request $request)
    {
        // Validate the form inputs, including the photo
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:categories,email',
            'phone_no' => 'required|string|max:15',
            'description' => 'nullable|string|max:500',
            'photo' => 'nullable|image|max:2048', // Validate photo field (optional image, max 2MB)
        ]);

        $photoPath = null;

        // Check if the user uploaded a photo
        if ($request->hasFile('photo')) {
            // Store the photo in the 'public/photos' directory and get the file path
            $photoPath = $request->file('photo')->store('photos', 'public');
        }

        // Create the new category record
        Category::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_no' => $request->phone_no,
            'description' => $request->description,
            'photo' => $photoPath, // Store the photo file path in the database
        ]);

        // Redirect to categories index with success message
        return redirect(route('reading'))->with('success', 'Category Created Successfully');
    }

    public function update(Category $category)
    {
        return view('update', ['category' => $category]);
    }

    public function updateConfirm(Request $request, Category $category)
    {
        // Validate the form inputs, including the photo
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:categories,email,' . $category->id,
            'phone_no' => 'required|string|max:15',
            'description' => 'nullable|string|max:500',
            'photo' => 'nullable|image|max:2048', // Validate photo field (optional image, max 2MB)
        ]);

        $photoPath = $category->photo; // Keep the existing photo if no new one is uploaded

        // Check if the user uploaded a new photo
        if ($request->hasFile('photo')) {
            // Store the new photo and get the file path
            $photoPath = $request->file('photo')->store('photos', 'public');

            // Optionally, delete the old photo if you want
            if ($category->photo) {
                Storage::delete('public/' . $category->photo); // Delete the old photo
            }
        }

        // Update the category record
        $category->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone_no' => $request->phone_no,
            'description' => $request->description,
            'photo' => $photoPath, // Store the photo file path in the database
        ]);

        // Redirect to categories index with success message
        return redirect(route('reading'))->with('success', 'Category Updated Successfully');
    }

    public function delete(Category $category)
    {
        // Optionally, delete the photo when deleting the category
        if ($category->photo) {
            Storage::delete('public/' . $category->photo); // Delete the photo file
        }

        $category->delete();
        return redirect(route('reading'))->with('success', 'Category Deleted Successfully');
    }
}
