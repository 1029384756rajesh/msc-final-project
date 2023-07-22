@extends("admin.base")

@section("head")
    <title>Order Details</title>
@endsection

@section("content")
<div class="grid grid-cols-12 gap-4 items-start">
    <div class="col-span-12 lg:col-span-8 card">
        <div class="card-header card-header-title">Products</div>

        <div class="card-body">
            <div class="table-responsive">
                <div class="table min-w-[700px]">
                    <table>
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->products as $product)   
                                <tr>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <img src="{{ $product->image }}"class="w-16 h-16 object-cover">
                                            <div>{{ $product->name }}</div>
                                        </div>
                                    </td>
                                    <td>₹ {{ $product->price }}</td>
                                    <td>{{ $product->quantity }}</td>
                                </tr>                  
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-span-12 lg:col-span-4 space-y-4">
        <div class="card">
            <div class="card-header card-header-title">Payment Details</div>
            
            <div class="card-body">
                <p class="flex items-center justify-between border-b border-gray-300 pb-3 mb-3">
                    <span>Product Price</span>
                    <span>₹ {{ $order->paymentDetails->product_price }}</span>
                </p>
                <p class="flex items-center justify-between border-b border-gray-300 pb-3 mb-3">
                    <span>Gst ({{ $order->paymentDetails->gst }}%)</span>
                    <span>₹ {{ $order->paymentDetails->gst_amount }}</span>
                </p>
                <p class="flex items-center justify-between border-b border-gray-300 pb-3 mb-3">
                    <span>Shipping Cost</span>
                    <span>₹ {{ $order->paymentDetails->shipping_cost }}</span>
                </p>
                <p class="flex items-center justify-between">
                    <span>Total Payable</span>
                    <span>₹ {{ $order->paymentDetails->total_amount }}</span>
                </p>
            </div>
        </div>

        <div class="card">
            <div class="card-header card-header-title">Shipping Address</div>
            <div class="card-body">
                <p class="border-b border-gray-300 pb-3 mb-3">Name - {{ $order->shippingAddress->name }}</p>
                <p class="border-b border-gray-300 pb-3 mb-3">Mobile - {{ $order->shippingAddress->mobile }}</p>
                <p>Address - {{ $order->shippingAddress->address }}</p>
            </div>
        </div>

        <div class="card">
            <div class="card-header card-header-title">Status</div>
            <div class="card-body">
                <form method="post" action="/admin/orders/{{ $order->id }}" class="flex">
                    @csrf 
                    @method("patch")

                    <select name="status" class="rounded-r-none form-control border-r-0">
                        <option {{ $order->status == "Placed" ? "selected" : "" }} value="Placed">Placed</option>
                        <option {{ $order->status == "Shipped" ? "selected" : "" }} value="Shipped">Shipped</option>
                        <option {{ $order->status == "Canceled" ? "selected" : "" }} value="Canceled">Canceled</option>
                        <option {{ $order->status == "Delivered" ? "selected" : "" }} value="Delivered">Delivered</option>
                    </select>     

                    <button class="btn btn-primary rounded-l-none" type="submit">
                        <i class="fa fa-check"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection