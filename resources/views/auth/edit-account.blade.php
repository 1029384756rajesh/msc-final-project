@extends("base")

@section("head")
    <title>Edit Account</title>
@endsection

@section("content")
<form class="card my-4 mx-auto" action="/account/update" style="max-width: 600px" method="post">
    @csrf
    @method("patch")

    <div class="card-header fw-bold text-primary">Edit Account</div>

    <div class="card-body">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            
            <input type="text" id="name" value="{{ old("name", auth()->user()->name) }}" 
            class="form-control {{ $errors->has("name") ? "is-invalid" : "" }}" name="name">
            
            @error("name")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            
            <input type="email" id="email" value="{{ old("email", auth()->user()->email) }}" class="form-control {{ $errors->has("email") ? "is-invalid" : "" }}" name="email">
            
            @error("email")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-primary">Save</button>
    </div>
</form>
@endsection