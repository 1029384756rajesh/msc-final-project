@extends("admin.base")

@section("head")
    <title>Edit Settings</title>
@endsection

@section("content")
<div class="card mx-auto" style="max-width: 600px">
    <div class="card-header fw-bold text-primary">Edit Setting</div>

    <form action="/admin/settings" class="card-body" method="post">
        @csrf 
        @method("patch")

        <div class="mb-3">
            <label for="about" class="form-label">About</label>

            <textarea
                type="text" 
                name="about" 
                id="editor" 
                class="form-control {{ $errors->has("name") ? "is-invalid" : "" }}"
            >{{ old("about", $settings->about) }}</textarea>

            @error("about")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="mobile" class="form-label">Mobile</label>

            <input 
                type="text" 
                name="mobile" 
                id="mobile" 
                value="{{ old("mobile", $settings->mobile) }}" 
                class="form-control {{ $errors->has("mobile") ? "is-invalid" : "" }}"
            >

            @error("mobile")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>

            <input 
                type="email" 
                name="email" 
                id="email" 
                value="{{ old("email", $settings->email) }}" 
                class="form-control {{ $errors->has("email") ? "is-invalid" : "" }}"
            >

            @error("email")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="tax" class="form-label">Tax (in %)</label>

            <input 
                type="number" 
                name="tax" 
                id="tax" 
                value="{{ old("tax", $settings->tax) }}" 
                class="form-control {{ $errors->has("tax") ? "is-invalid" : "" }}"
            >

            @error("tax")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="shippingCost" class="form-label">Shipping Cost</label>

            <input 
                type="number" 
                name="shipping_cost" 
                id="shippingCost" 
                value="{{ old("shipping_cost", $settings->shipping_cost) }}" 
                class="form-control {{ $errors->has("shipping_cost") ? "is-invalid" : "" }}"
            >

            @error("shipping_cost")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection