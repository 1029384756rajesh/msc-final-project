<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Slider;
use App\Helpers\CategoryHelper;

class HomeController extends Controller
{
    public function products(Request $request)
    {
        $builder = Product::orderBy("id", "desc");

        if($request->category_id)
        {
            $builder->where("category_id", $request->category_id);
        }

        $products = $builder->get();

        return view("products", [
            "products" => $products
        ]);
    }

    public function search(Request $request)
    {
        $products = Product::where("name", "like", "%" . $request->search . "%")->get();

        return view("search", ["products" => $products]);
    }

    public function product(Product $product)
    {
        return view("product", ["product" => $product]);
    }

    public function index(Request $request)
    {
        return view("index", [
            "sliders" => Slider::all(),
            "categories" => Category::all()
        ]);
    }

    public function about()
    {
        return view("about", ["about" => Setting::first()->about]);
    }
}
