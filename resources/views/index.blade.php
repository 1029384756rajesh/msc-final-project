@extends("base")

@section("head")
<title>Home</title>
@endsection

@section("content")
<div id="indexCarousel" class="carousel slide">
    <div class="carousel-inner">
        @foreach ($sliders as $slider)
          <div class="carousel-item {{ $loop->index == 0 ? "active" : "" }}">
              <img src="/storage/{{ $slider->image_url }}" class="d-block w-100">
          </div>
        @endforeach
    </div>
    
    <button class="carousel-control-prev" type="button" data-bs-target="#indexCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    
    <button class="carousel-control-next" type="button" data-bs-target="#indexCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="container">
    <h3 class="fw-bold text-primary text-center mt-5 mb-4">CATEGORIES</h3>

    <div class="row gy-3 mb-4">
        @foreach ($categories as $category)
            <div class="col-md-3">
                <div class="card" style="cursor: pointer" onclick="window.location.href='products?category_id={{ $category->id }}'">
                    <img src="/storage/{{ $category->image_url }}" class="img-fluid">
                    <div class="card-footer">
                        <p class="text-center text-primary fw-bold mb-0">{{ $category->name }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection