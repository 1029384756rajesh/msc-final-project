@extends("base")

@section("head")
    <title>Cart</title>
@endsection

@section("content")
<div class="container my-4">
    @if (count($cart) == 0) 
        <div class="alert alert-warning">Your Cart Is Empty</div> 
    @else
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header fw-bold text-primary">Cart</div>
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
                                    @foreach ($cart as $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex gap-3 align-items-center">
                                                    <img src="/storage/{{ $item->product->image_url }}" class="img-fluid" width="60px">
                                                    <p>{{ $item->product->name }}</p>
                                                </div>
                                            </td>
                                            <td>
                                                <form class="input-group" action="/cart/{{ $item->product->id }}" method="POST">
                                                    @csrf

                                                    <input type="number" min="1" name="quantity" class="form-control" value="{{ $item->quantity }}">
                                                    
                                                    <button class="btn btn-sm btn-warning" type="submit">
                                                        <i class="fa fa-check"></i>
                                                    </button>
                                                </form>
                                            </td>

                                            <td>
                                                <form action="/cart/{{ $item->id }}" method="post">
                                                    @csrf
                                                    @method("delete")

                                                    <button class="btn btn-sm btn-danger">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
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
                    <div class="card-header fw-bold text-primary">Pricing Details</div>
                    <div class="card-body">
                        <p class="d-flex align-items-center justify-content-between">
                            <span>Product Price</span>
                            <span>₹ {{ $product_price }}</span>
                        </p>
                        <p class="d-flex align-items-center justify-content-between">
                            <span>Shipping Cost</span>
                            <span>₹ {{ $shipping_cost }}</span>
                        </p>
                        <p class="d-flex align-items-center justify-content-between border-top pt-2">
                            <span>Total Payable</span>
                            <span>₹ {{ $product_price + $shipping_cost }}</span>
                        </p>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <a href="/checkout" class="btn btn-primary">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection