@extends("base")

@section("head")
    <title>Product</title>
@endsection

@section("content")
<div class="container my-4">
    <div class="card">
        <div class="card-header fw-bold text-primary">Product Details</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <img src="/storage/{{ $product->image_url }}" class="img-fluid">
                </div>
                <div class="col-md-8">
                    <p class="fw-bold text-primary h5 mb-3">{{ $product->name }}</p>
                    <p class="mb-3">{{ $product->short_description }}</p>
                    <p class="fw-bold mb-3">Rs. {{ $product->price }}</p>
                    <form class="input-group mb-3" style="max-width: 200px" action="/cart/{{ $product->id }}" method="POST">
                        @csrf
                        <input type="number" name="quantity" id="quantity" class="form-control" value="1" min="1">
                        <button class="btn btn-primary">Add to cart</button>
                    </form>
                    <p>{{ $product->description }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection