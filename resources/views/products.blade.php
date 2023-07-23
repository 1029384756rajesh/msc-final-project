@extends("base")

@section('content')
<div class="container">
    <h3 class="fw-bold text-primary text-center mt-5 mb-4">PRODUCTS</h3>

    <div class="row gy-3 mb-4">
        @foreach ($products as $product)
            <div class="col-md-3">
                <div class="card" style="cursor: pointer" onclick="window.location.href='product/{{ $product->id }}'">
                    <img src="/storage/{{ $product->image_url }}" class="img-fluid">
                    <p class="text-center fw-bold mb-0 mt-2">{{ $product->name }}</p>
                    <p class="text-center text-primary fw-bold mb-2 mt-2">Rs. {{ $product->price }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection