@extends("base")

@section("head")
    <title>Search Product</title>
@endsection

@section("content")
<div class="container my-4">
    <form class="card mx-auto mb-4" style="max-width: 600px">
        <div class="card-header fw-bold text-primary">Search</div>
        <div class="card-body">
            <div class="input-group">
                <input type="search" class="form-control" name="search">
                <button type="submit" class="btn btn-secondary">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    @if (request()->query("search"))
        <p class="fw-bold text-primary">{{ count($products) }} Products Found</p>
    @endif

    <div class="row gy-3">
        @foreach ($products as $product)
            <div class="col-md-3">
                <div class="card" style="cursor: pointer" onclick="window.location.href='products/{{ $product->id }}'">
                    <img src="/storage/{{ $product->image_url }}" class="img-fluid">
                    <p class="text-center fw-bold mb-0 mt-2">{{ $product->name }}</p>
                    <p class="text-center text-primary fw-bold mb-2 mt-2">Rs. {{ $product->price }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection