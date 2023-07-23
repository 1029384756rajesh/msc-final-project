<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield("head")

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">Rmart</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::path() == "/" ? "active" : "" }}" href="/">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ str_starts_with(Request::path(), "products") ? "active" : "" }}" href="/products">Products</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Request::path() == "search" ? "active" : "" }}" href="/search">Search</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Request::path() == "cart" || Request::path() == "checkout" ? "active" : "" }}" href="/cart">Cart</a>
                    </li>

                    @if (auth()->user())
                    <li class="nav-item dropdown" data-bs-theme="light">
                        <a class="nav-link dropdown-toggle {{ Request::path() == "orders" || Request::path() == "account/password/edit" || Request::path() == "account/edit" || str_starts_with(Request::path(), "orders/") ? "active" : "" }}" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Account
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item {{ str_starts_with(Request::path(), "orders") ? "active" : "" }}" href="/orders">Orders</a></li>
                            <li><a class="dropdown-item {{ Request::path() == "account/edit" ? "active" : "" }}" href="/account/edit">Edit Account</a></li>
                            <li><a class="dropdown-item {{ Request::path() == "account/password/edit" ? "active" : "" }}" href="/account/password/edit">Change Password</a></li>
                            @if (auth()->user()->is_admin)
                                <li><a class="dropdown-item" href="/admin">Admin Panel</a></li>
                            @endif
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="/account/logout">Logout</a></li>
                        </ul>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link {{ str_starts_with(Request::path(), "login") ? "active" : "" }}" href="/account/login">Login</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ str_starts_with(Request::path(), "register") ? "active" : "" }}" href="/account">Register</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @if (session()->has("success"))
    <div class="alert alert-success">{{ session("success") }}</div>
    @endif

    @if (session()->has("error"))
    <div class="alert alert-danger">{{ session("error") }}</div>
    @endif

    @yield("content")

    <script>
        window.user = @json(auth() -> user())
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>