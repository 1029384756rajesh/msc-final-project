<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{ 
    public function products()
    {
        $products = Product::orderBy("id", "desc")->with("category")->get();

        return view("admin.products", ["products" => $products]);
    }

    public function edit(Product $product)
    {
        return view("admin.create-product", [
            "product" => $product,
            "categories" => Category::all()
        ]);
    }

    public function create()
    {
        return view("admin.create-product", ["categories" => Category::all()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "short_description" => "required",
            "category_id" => "required|exists:categories,id",
            "stock" => "required|integer",
            "price" => "required|integer",
            "image" => "required"
        ]);

        Product::create([
            "name" => $request->name,
            "short_description" => $request->short_description,
            "description" => $request->description,
            "category_id" => $request->category_id,
            "stock" => $request->stock,
            "price" => $request->price,
            "image_url" => $request->image->store("images/products", "public")
        ]);

        return redirect("/admin/products")->with("success", "Product created successfully");
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            "name" => "required",
            "short_description" => "required",
            "category_id" => "required|exists:categories,id",
            "stock" => "required|integer",
            "price" => "required|integer"
        ]);

        if($request->image)
        {
            $product->image_url = $request->image->store("images/products", "public");
        }

        $product->name = $request->name;

        $product->short_description = $request->short_description;

        $product->description = $request->description;

        $product->price = $request->price;

        $product->stock = $request->stock;

        $product->category_id = $request->category_id;

        $product->save();

        return redirect("/admin/products")->with("success", "Product updated successfully");
    }
    public function delete(Product $product)
    {
        $product->delete();

        return back()->with("success", "Product deleted successfully");
    }
}
