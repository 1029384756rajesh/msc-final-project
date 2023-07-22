@extends("admin.base")

@section("head")
    <title>Create Product</title>
@endsection

@section("content")
<div class="card mx-auto" style="max-width: 600px">
    <div class="card-header fw-bold text-primary">
        {{ isset($product) ? "Edit Product" : "Create New Product" }}
    </div>

    <form action="/admin/products/{{ isset($product) ? $product->id : "" }}?_method={{ isset($product) ? "patch" : "post" }}" class="card-body" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>

            <input type="text" name="name" id="name" class="form-control {{ $errors->has("name") ? "is-invalid" : "" }}" 
            value="{{ old("name", $product->name ?? "") }}">

            @error("name")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>

            <input type="number" name="price" id="price" class="form-control {{ $errors->has("price") ? "is-invalid" : "" }}" 
            value="{{ old("price", $product->price ?? "") }}">

            @error("price")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>

            <input type="number" name="stock" id="stock" class="form-control {{ $errors->has("stock") ? "is-invalid" : "" }}" 
            value="{{ old("stock", $product->stock ?? "") }}">

            @error("stock")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="short_description" class="form-label">Short Description</label>

            <input type="text" name="short_description" id="short_description" class="form-control {{ $errors->has("short_description") ? "is-invalid" : "" }}" 
            value="{{ old("short_description", $product->short_description ?? "") }}">

            @error("short_description")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>

            <textarea type="text" name="description" id="description" class="form-control {{ $errors->has("description") ? "is-invalid" : "" }}">
                {{ old("description", $product->description ?? "") }}
            </textarea>

            @error("description")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>

            <select name="category_id" id="category_id" class="form-control">
                @foreach ($categories as $category)
                    <option {{ old("category_id", $product->category_id ?? -1) == $category->id ? "selected" : "" }} value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            @error("category_id")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>

            <input type="file" name="image" id="image" class="form-control {{ $errors->has("image") ? "is-invalid" : "" }}" 
            value="{{ old("image", $product->image ?? "") }}">

            @error("image")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection