@extends("base")

@section("head")
    <title>Order</title>
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
                                    <th>Quantity</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>
                                            <div class="d-flex gap-3 align-items-center">
                                                <img src="/storage/{{ $product->image_url }}" class="img-fluid" width="60px">
                                                <p>{{ $product->name }}</p>
                                            </div>
                                        </td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>Rs. {{ $product->price }}</td>
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
                        <span>Rs. {{ $product_price + $order->shipping_cost }}</span>
                    </p>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header card-header-title">Shipping Address</div>
                <div class="card-body">
                    <p class="border-b border-gray-300 pb-3 mb-3">Name - {{ $order->shippingAddress->name }}</p>
                    <p class="border-b border-gray-300 pb-3 mb-3">Mobile - {{ $order->shippingAddress->mobile }}</p>
                    <p>Address - {{ $order->shippingAddress->address }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection