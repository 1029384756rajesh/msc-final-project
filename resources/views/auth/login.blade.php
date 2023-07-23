@extends('base')

@section('content')
<form class="card mx-auto my-4" style="max-width: 600px" action="/account/login" method="POST">
    @csrf

    <div class="card-header fw-bold text-primary">Login</div>

    <div class="card-body">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" id="email" value="{{ old('email') }}">
            @error('email')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" id="password">
            @error('password')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        
        <button class="btn btn-primary">Login</button>
    </div>
</form>
@endsection