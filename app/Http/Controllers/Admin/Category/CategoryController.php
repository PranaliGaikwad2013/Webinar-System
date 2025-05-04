<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use File;
use Str;

class CategoryController extends Controller
{
    public function listCategory(Request $request)
{
    $search = $request->input('search');

    $categories = Category::when($search, function ($query, $search) {
        return $query->where('category_name', 'like', '%' . $search . '%');
    })
    ->orderBy('created_at', 'asc')
    ->paginate(10);

    return view('admin.category.index', compact('categories', 'search'));
}

    public function createCategory()
    {
        return view('admin.category.create');
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string',
            'category_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|string',
        ]);

        $category = Category::create([
            'category_name' => $request->category_name,
            'status' => $request->status,
        ]);
    
        if ($request->hasFile('category_image')) {
            if (!empty($category->category_image) && file_exists('upload/category/' . $category->category_image)) {
                unlink('upload/category/' . $category->category_image);
            }
    
            $file = $request->file('category_image');
            $randomStr = Str::random(30);
            $filename = $randomStr . '.' . $file->getClientOriginalExtension();
            $file->move('upload/category/', $filename);
            $category->category_image = $filename;
            $category->save(); 
        }
    
        return redirect()->route('category.list')->with('success', 'Category created successfully!');
    }


    public function editCategory($id)
{
    $category = Category::findOrFail($id);
    return view('admin.category.create', compact('category'));
}

public function updateCategory(Request $request, $id)
{
    $request->validate([
        'category_name' => 'required|string',
        'category_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'status' => 'required|string',
    ]);

    $category = Category::findOrFail($id);
    $category->category_name = $request->category_name;
    $category->status = $request->status;

    if ($request->hasFile('category_image')) {
        if (!empty($category->category_image) && file_exists('upload/category/' . $category->category_image)) {
            unlink('upload/category/' . $category->category_image);
        }

        $file = $request->file('category_image');
        $filename = Str::random(30) . '.' . $file->getClientOriginalExtension();
        $file->move('upload/category/', $filename);
        $category->category_image = $filename;
    }

    $category->save();

    return redirect()->route('category.list')->with('success', 'Category updated successfully!');
}


public function deleteCategory($id)
{
    $category = Category::findOrFail($id);

    // Delete category image from folder if exists
    if ($category->category_image && file_exists('upload/category/' . $category->category_image)) {
        unlink('upload/category/' . $category->category_image);
    }

    $category->delete();

    return redirect()->route('category.list')->with('success', 'Category deleted successfully!');
}


    }

