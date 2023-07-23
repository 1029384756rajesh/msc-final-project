@extends("admin.base")

@section("head")
    <title>Order Details</title>
@endsection

@section("content")
<div class="container my-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header fw-bold text-primary">Products</div>
        
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
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
                                            <div class="d-flex align-items-center gap-3">
                                                <img src="/storage/{{ $product->image_url }}"class="img-fluid" width="60px">
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
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-header fw-bold text-primary">Payment Details</div>
                
                <div class="card-body">
                    <p class="d-flex align-items-center justify-content-between mb-3">
                        <span>Product Price</span>
                        <span>Rs. {{ $product_price }}</span>
                    </p>
                    <p class="d-flex align-items-center justify-content-between mb-3">
                        <span>Shipping Cost</span>
                        <span>Rs. {{ $order->shipping_cost }}</span>
                    </p>
                    <p class="d-flex align-items-center justify-content-between mb-0 pt-2 border-top">
                        <span>Total Payable</span>
                        <span>Rs. {{ $order->shipping_cost + $product_price }}</span>
                    </p>
                </div>
            </div>
    
            <div class="card mt-3">
                <div class="card-header card-header-title">Shipping Address</div>
                <div class="card-body">
                    <p class="border-b border-gray-300 pb-3 mb-3">Name - {{ $order->shippingAddress->name }}</p>
                    <p class="border-b border-gray-300 pb-3 mb-3">Mobile - {{ $order->shippingAddress->mobile }}</p>
                    <p>Address - {{ $order->shippingAddress->address }}</p>
                </div>
            </div>
    
            <div class="card mt-3">
                <div class="card-header fw-bold text-primary">Status</div>
                <div class="card-body">
                    <form method="post" action="/admin/orders/{{ $order->id }}" class="input-group">
                        @csrf 
                        @method("patch")
    
                        <select name="status" class="form-control">
                            <option {{ $order->status == "Placed" ? "selected" : "" }} value="Placed">Placed</option>
                            <option {{ $order->status == "Shipped" ? "selected" : "" }} value="Shipped">Shipped</option>
                            <option {{ $order->status == "Canceled" ? "selected" : "" }} value="Canceled">Canceled</option>
                            <option {{ $order->status == "Delivered" ? "selected" : "" }} value="Delivered">Delivered</option>
                        </select>     
    
                        <button class="btn btn-primary" type="submit">
                            <i class="fa fa-check"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection