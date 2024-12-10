<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

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
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:categories,email',
            'phone_no' => 'required|string|max:15',
            'description' => 'nullable|string|max:500',
        ]);

        Category::create($data);
        return redirect(route('reading'))->with('success', 'Category Created Successfully');
    }

    public function update(Category $category)
    {
        return view('update', ['category' => $category]);
    }

    public function updateConfirm(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:categories,email,' . $category->id,
            'phone_no' => 'required|string|max:15',
            'description' => 'nullable|string|max:500',
        ]);

        $category->update($data);
        return redirect(route('reading'))->with('success', 'Category Updated Successfully');
    }

    public function delete(Category $category)
    {
        $category->delete();
        return redirect(route('reading'))->with('success', 'Category Deleted Successfully');
    }
}
