@extends("admin.base")

@section("head")
    <title>Create Slider</title>
@endsection

@section("content")
<div class="card mx-auto" style="max-width: 600px">
    <div class="card-header fw-bold text-primary">Create New Slider</div>

    <form action="/admin/sliders" class="card-body" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>

            <input type="file" class="form-control {{ $errors->has("image") ? "is-invalid" : "" }}" name="image" id="image">

            @error("image")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection