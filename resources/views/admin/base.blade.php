<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    @yield("head")
      
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>   
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container-fluid my-4">
        <div class="row">
            <div class="col-md-2">
                <div class="list-group">
                    <a href="/admin" class="list-group-item list-group-item-action {{ Request::path() == "admin" ? "active" : "" }}">Dashboard</a>
                    <a href="/admin/sliders" class="list-group-item list-group-item-action {{ str_starts_with(Request::path(), "admin/sliders") ? "active" : "" }}">Sliders</a>
                    <a href="/admin/categories" class="list-group-item list-group-item-action {{ str_starts_with(Request::path(), "admin/categories") ? "active" : "" }}">Categories</a>
                    <a href="/admin/products" class="list-group-item list-group-item-action {{ str_starts_with(Request::path(), "admin/products") ? "active" : "" }}">Products</a>
                    <a href="/admin/orders" class="list-group-item list-group-item-action {{ str_starts_with(Request::path(), "admin/orders") ? "active" : "" }}">Orders</a>
                    <a href="/admin/users" class="list-group-item list-group-item-action {{ str_starts_with(Request::path(), "admin/users") ? "active" : "" }}">Users</a>
                    <a href="/admin/settings" class="list-group-item list-group-item-action {{ str_starts_with(Request::path(), "admin/settings") ? "active" : "" }}">Settings</a>
                    <a href="/auth/logout" class="list-group-item list-group-item-action">Logout</a>
                    <a href="/" class="list-group-item list-group-item-action">Site</a>
                  </div>
            </div>
    
            <div class="col-md-10 mt-3 mt-md-0">
                @if (session()->has("success"))
                    <div class="alert alert-success">{{ session("success") }}</div>
                @endif
    
                @yield("content")
            </div>
        </div>
    </div>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>