@extends("base")

@section("head")
    <title>Edit Account</title>
@endsection

@section("content")
<form class="max-w-lg card mx-auto" action="/account/update" method="post">
    @csrf
    @method("patch")

    <div class="card-header card-header-title">Edit Account</div>

    <div class="card-body">
        <div class="form-group">
            <label for="name" class="form-label">Name</label>
            
            <input type="text" id="name" value="{{ old("name", auth()->user()->name) }}" class="form-control {{ $errors->has("name") ? "form-control-error" : "" }}" name="name">
            
            @error("name")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            
            <input type="email" id="email" value="{{ old("email", auth()->user()->email) }}" class="form-control {{ $errors->has("email") ? "form-control-error" : "" }}" name="email">
            
            @error("email")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-primary">Save</button>
    </div>
</form>
@endsection