@extends("base")

@section("Change Password")
    <title>Change Password</title>
@endsection

@section("content")
<form class="card my-4 mx-auto" style="max-width: 600px" action="/account/password/change" method="post">
    @csrf
    @method("patch")

    <div class="card-header fw-bold text-primary">Change Password</div>

    <div class="card-body">
        <div class="mb-3">
            <label for="oldPassword" class="form-label">Old Password</label>
            
            <input type="password" id="oldPassword" class="form-control {{ $errors->has("old_password") ? "is-invalid" : "" }}" name="old_password" id="old_password">
            
            @error("old_password")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="newPassword" class="form-label">New Password</label>
            
            <input type="password" id="newPassword" class="form-control {{ $errors->has("old_password") ? "is-invalid" : "" }}" name="new_password">
            
            @error("new_password")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="newPasswordConfirmation" class="form-label">Confirm New Password</label>
            
            <input type="password" id="newPasswordConfirmation" class="form-control {{ $errors->has("new_password_confirmation") ? "is-invalid" : "" }}" name="new_password_confirmation">
            
            @error("new_password_confirmation")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-primary">Change Password</button>
    </div>
</form>
@endsection