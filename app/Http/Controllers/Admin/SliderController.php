<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    public function index()
    {
        return view("admin.sliders", ["sliders" => Slider::all()]);
    }
    public function create()
    {
        return view("admin.create-slider");
    }

    public function store(Request $request)
    {
        $request->validate(["image" => "required"]);

        Slider::create(["image_url" => $request->image->store("images/sliders", "public")]);

        return back()->with("success", "Category created successfully");
    }

    public function delete(Slider $slider)
    {
        $slider->delete();

        return back()->with("success", "Category deleted successfully");
    }
}
