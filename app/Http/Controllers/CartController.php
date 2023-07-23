<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Cart;

class CartController extends Controller
{
    public function checkout(Request $request)
    {
        $cart = $request->user()->cart()->with("product")->get();

        $product_price = 0;

        foreach ($cart as $item) 
        {
            $product_price += $item->product->price;
        }

        $shipping_cost = Setting::first()->shipping_cost;

        return view("checkout", [
            "cart" => $cart,
            "product_price" => $product_price,
            "shipping_cost" => $shipping_cost
        ]);
    }
    public function index(Request $request)
    {
        $cart = $request->user()->cart()->with("product")->get();

        $product_price = 0;

        foreach ($cart as $item) 
        {
            $product_price += $item->product->price;
        }

        $shipping_cost = Setting::first()->shipping_cost;

        return view("cart", [
            "cart" => $cart,
            "product_price" => $product_price,
            "shipping_cost" => $shipping_cost
        ]);
    }

    public function store(Request $request, Product $product)
    {
        $request->validate(["quantity" => "required|integer"]);

        $cart = $request->user()->cart()->where("product_id", $product->id)->first();

        if($cart)
        {
            $cart->quantity = $request->quantity;
            $cart->save();
            return back()->with(["success" => "Product updated in the cart successfully"]);
        }
        else 
        {
            $request->user()->cart()->create([
                "product_id" => $product->id,
                "quantity" => $request->quantity
            ]);

            return back()->with(["success" => "Product added to the cart successfully"]);
        }
        
    }

    public function delete(Request $request, Cart $cart)
    {
        $cart->delete();

        return back()->with(["success" => "Product removed from cart successfully"]);
    }
}
