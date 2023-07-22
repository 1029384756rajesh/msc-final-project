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
            "name" => "required|max:50",
            "mobile" => "required|integer|min:1000000000|max:9999999999",
            "address_line_1" => "required|max:100",
            "address_line_2" => "required|max:100",
            "city" => "required|max:20",
            "state" => "required|max:40",
            "pincode" => "required|min:6|max:6",
        ]);

        $cart = $request->user()->cart()->where("has_variations", false)->where("is_completed", true)->with("options", "options.attribute", "parent")->get();
        
        $finalCart = [];

        foreach ($cart as $cartItem) 
        {
            if($cartItem->stock && $cartItem->stock < $cartItem->pivot->quantity) continue;

            $data = (object)[
                "id" => $cartItem->id,
                "quantity" => $cartItem->pivot->quantity,
                "price" => $cartItem->price
            ];

            if($cartItem->parent_id)
            {
                $data->name = $cartItem->parent->name;

                $data->attributes = $cartItem->options->map(fn($option) => (object)[
                    "option" => $option->name,
                    "name" => $option->attribute->name 
                ]);

                $data->image = empty($cartItem->images) ? explode("|", $cartItem->parent->images)[0] :
                    explode("|", $cartItem->images)[0];
            }
            else 
            {
                $data->name= $cartItem->name;
                $data->attributes = [];
                $data->image = explode("|", $cartItem->images)[0];
            }

            array_push($finalCart, $data);
        }

        if(count($finalCart) == 0) return abort(404);

        $setting = Setting::first();

        $productPrice = 0;

        foreach ($finalCart as $cartItem) $productPrice += ($cartItem->price * $cartItem->quantity);

        $gstAmount = $productPrice * ($setting->gst / 100);

        $totalAmount = $gstAmount + $productPrice + $setting->shippingCost;
  
        $order = $request->user()->orders()->create(["status" => "Placed"]);

        $order->shippingAddress()->create([
            "name" => $request->name,
            "mobile" => $request->mobile,
            "address" => "{$request->address_line_1}, {$request->address_line_2}, {$request->city}, {$request->pincode}"
        ]);

        $order->paymentDetails()->create([
            "shipping_cost" => $setting->shipping_cost,
            "gst" => $setting->gst,
            "gst_amount" => $gstAmount,
            "product_price" => $productPrice,
            "total_amount" => $totalAmount
        ]);

        foreach ($finalCart as $cartItem) 
        {
            $this->updateProductStock($cartItem);

            $product = $order->products()->create([
                "product_id" => $cartItem->id,
                "name" => $cartItem->name,
                "quantity" => $cartItem->quantity,
                "image" => $cartItem->image,
                "price" => $cartItem->price
            ]);

            foreach ($cartItem->attributes as $attribute) $product->attributes()->create([
                "name" => $attribute->name,
                "option" => $attribute->option
            ]);
        }

        $request->user()->cart()->detach();

        return redirect("/orders")->with("success", "Order placed successfully");
    }   

    public function index(Request $request)
    {
        $orders = $request->user()->orders()->orderBy("orders.id", "desc")->with("paymentDetails", "products")->get()->transform(fn($order) => (object)[
            "id" => $order->id,
            "status" => $order->status,
            "created" => date("d-m-Y", strtotime($order->created_at)),
            "total_products" => count($order->products),
            "total_amount" => $order->paymentDetails->total_amount
        ]);

        return view("orders", ["orders" => $orders]);
    }   
    
    public function show(Request $request, $orderId)
    {
        $order = $request->user()->orders()->where("id", $orderId)->with("paymentDetails", "shippingAddress", "products", "products.attributes")->first();

        $order->products = $order->products->transform(function($product)
        {
            if(count($product->attributes))
            {
                $product->name = "$product->name : ";

                foreach ($product->attributes as $attribute) $product->name .= "$attribute->name - $attribute->option, ";

                $product->name = substr($product->name, 0, -2);
            }

            return (object)[
                "id" => $product->id,
                "name" => $product->name,
                "quantity" => $product->quantity,
                "image" => $product->image,
                "price" => $product->price
            ];
        });

        return view("order", ["order" => $order]);
    }   
}
