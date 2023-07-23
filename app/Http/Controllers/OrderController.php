<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Setting;
use App\Models\Product;
use App\Models\User;
use App\Models\OrderedAttribute;
use App\Helpers\LangHelper;

class OrderController extends Controller
{
    private function updateProductStock($cartItem)
    {
        $product = Product::where("id", $cartItem->id)->where("has_variations", false)->where("is_completed", true)->first();

        if(!$product || !$product->stock) return;

        $newStock = $product->stock - $cartItem->quantity;

        if($newStock < 0 ) $newStock = 0;

        $product->stock = $newStock;

        $product->save();
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "mobile" => "required",
            "address_line_1" => "required",
            "address_line_2" => "required",
            "city" => "required",
            "state" => "required",
            "pincode" => "required",
        ]);

        $cart = $request->user()->cart()->with("product")->get();

        $shipping_cost = Setting::first()->shipping_cost;

        $order = $request->user()->orders()->create([
            "status" => "Placed",
            "shipping_cost" => $shipping_cost
        ]);

        $order->shippingAddress()->create([
            "name" => $request->name,
            "mobile" => $request->mobile,
            "address" => $request->address_line_1 . ", " . $request->address_line_2 . ", " . $request->city . ", " . $request->state . ", " . $request->pincode
        ]);

        foreach ($cart as $item) 
        {
            $order->products()->create([
                "name" => $item->product->name,
                "price" => $item->product->price,
                "image_url" => $item->product->image_url,
                "quantity" => $item->quantity
            ]);
        }

        $request->user()->cart()->delete();

        return redirect("/orders")->with("success", "Order placed successfully");
    }   

    public function index(Request $request)
    {
        $orders = $request->user()->orders()->orderBy("orders.id", "desc")->with("products", "user")->get();

        return view("orders", ["orders" => $orders]);
    }   
    
    public function show(Request $request, Order $order)
    {
        $products = $order->products()->get();

        $shippingAddress = $order->shippingAddress()->first();

        $product_price = 0;

        foreach ($products as $product) 
        {
            $product_price += $product->price;
        }

        return view("order", [
            "order" => $order,
            "products" => $products,
            "product_price" => $product_price
        ]);
    }   
}
