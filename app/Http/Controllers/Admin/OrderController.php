<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::orderBy("orders.id", "desc")->with("products", "user")->get();
        
        return view("admin.orders", ["orders" => $orders]);
    }  

    public function show(Request $request, Order $order)
    {
        $shipping_address = $order->shippingAddress()->first();

        $products = $order->products()->get();

        $product_price = 0;

        foreach ($products as $product) 
        {
            $product_price += $product->price;
        }

        return view("admin.order", ["order" => $order, "shipping_address" => $shipping_address, "products" => $products,
    "product_price" => $product_price]);
    }   

    public function update(Request $request, Order $order)
    {
        $request->validate(["status" => "required"]);

        $order->status = $request->status;

        $order->save();

        return back()->with("success", "Order updated successfully");
    }
}
