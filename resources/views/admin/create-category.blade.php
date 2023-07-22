@extends("admin.base")

@section("head")
    <title>Create Category</title>
@endsection

@section("content")
<div class="card mx-auto" style="max-width: 600px">
    <div class="card-header fw-bold text-primary">
        {{ isset($category) ? "Create New Category" : "Edit Category"}}
    </div>

    <form action="/admin/categories/{{ isset($category) ? $category->id : "" }}?_method={{ isset($category) ? "patch" : "post" }}" class="card-body" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>

            <input type="text" name="name" id="name" class="form-control {{ $errors->has("name") ? "is-invalid" : "" }}" value="{{ old("name", $category->name ?? "") }}">

            @error("name")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>

            <input type="file" name="image" class="form-control {{ $errors->has("image") ? "is-invalid" : "" }}" id="image">

            @error("image")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection