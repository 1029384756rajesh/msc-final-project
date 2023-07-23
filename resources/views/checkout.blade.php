@extends("base")

@section("head")
    <title>Checkout</title>
@endsection

@section("content")   
<form action="/orders" method="post" class="container my-4">
    @csrf

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header fw-bold text-primary">Shipping Address</div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
        
                        <input type="text" name="name" id="name" value="{{ old("name") }}" class="form-control {{ $errors->has("name") ? "is-invalid" : "" }}">
                    
                        @error("name")
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
        
                    <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile</label>
        
                        <input type="number" name="mobile" id="mobile" value="{{ old("mobile") }}" class="form-control {{ $errors->has("mobile") ? "is-invalid" : "" }}">
                    
                        @error("mobile")
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
        
                    <div class="mb-3">
                        <label for="addressLine1" class="form-label">Address line 1</label>
        
                        <input type="text" name="address_line_1" id="addressLine1" value="{{ old("address_line_1") }}" class="form-control {{ $errors->has("address_line_1") ? "is-invalid" : "" }}">
                    
                        @error("address_line_1")
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
        
                    <div class="mb-3">
                        <label for="addressLine2" class="form-label">Address line 2</label>
        
                        <input type="text" name="address_line_2" id="addressLine2" value="{{ old("address_line_2") }}" class="form-control {{ $errors->has("address_line_2") ? "is-invalid" : "" }}">
                    
                        @error("address_line_2")
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
        
                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
        
                        <input type="text" name="city" id="city" value="{{ old("city") }}" class="form-control {{ $errors->has("city") ? "is-invalid" : "" }}">
                    
                        @error("city")
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
        
                    <div class="mb-3">
                        <label for="state" class="form-label">State</label>
        
                        <input type="text" name="state" id="state" value="{{ old("state") }}" class="form-control {{ $errors->has("state") ? "is-invalid" : "" }}">
                    
                        @error("state")
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
        
                    <div>
                        <label for="pincode" class="form-label">Pincode</label>
        
                        <input type="text" name="pincode" id="pincode" value="{{ old("pincode") }}" class="form-control {{ $errors->has("pincode") ? "is-invalid" : "" }}">
                    
                        @error("pincode")
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header fw-bold text-primary">Pricing Details</div>
                <div class="card-body">
                    <p class="d-flex align-items-center justify-content-between mb-3">
                        <span>Product Price</span>
                        <span>₹ {{ $product_price }}</span>
                    </p>
                    <p class="d-flex align-items-center justify-content-between mb-3">
                        <span>Shipping Cost</span>
                        <span>₹ {{ $shipping_cost }}</span>
                    </p>
                    <p class="d-flex align-items-center justify-content-between pt-2 border-top mb-0">
                        <span>Total Payable</span>
                        <span>₹ {{ $product_price + $shipping_cost }}</span>
                    </p>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Place Order</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection