<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Helpers\CategoryHelper;

class CategoryController extends Controller
{
    public function categories()
    {        
        return view("admin.categories", ["categories" => Category::all()]);
    }

    public function create()
    {        
        return view("admin.create-category");
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|min:2|max:255|unique:categories,name",
            "image" => "required",
        ]);

        Category::create([
            "image_url" => $request->image->store('images/categories', 'public'),
            "name" => $request->name
        ]);

        return back()->with("success", "Category created successfully");
    }

    public function edit(Category $category)
    {        
        return view("admin.create-category", [
            "category" => $category
        ]);
    }

    public function update(Request $request, Category $category)
    {
       $request->validate([
            "name" => "required|min:2|max:255|unique:categories,name," . $category->id
        ]);

        if($request->image)
        {
            $category->image_url = $request->file("image")->store("images/categories", "public");
        }

        $category->name = $request->name;

        $category->save();

        return redirect("/admin/categories")->with("success", "Category updated successfully");
    }

    public function delete(Category $category)
    {
        $category->delete(); 

        return back()->with("success", "Category deleted successfully");
    }
}
