@extends("admin.base")

@section("head")
    <title>Dashboard</title>
@endsection

@section("content")
<div class="row gy-3">
    <div class="col-md-4">
        <div class="card text-center">
            <div class="card-header fw-bold text-primary">
                Total Sliders
            </div>
            <div class="card-body">
                <h1>{{ $total_sliders }}</h1>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-center">
            <div class="card-header fw-bold text-primary">
                Total Categories
            </div>
            <div class="card-body">
                <h1>{{ $total_categories }}</h1>
            </div>
        </div>    
    </div>

    <div class="col-md-4">
        <div class="card text-center">
            <div class="card-header fw-bold text-primary">
                Total Products
            </div>
            <div class="card-body">
                <h1>{{ $total_products }}</h1>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-center">
            <div class="card-header fw-bold text-primary">
                Total Orders
            </div>
            <div class="card-body">
                <h1>{{ $total_orders }}</h1>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-center">
            <div class="card-header fw-bold text-primary">
                Total Placed Orders
            </div>
            <div class="card-body">
                <h1>{{ $total_placed_orders }}</h1>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-center">
            <div class="card-header fw-bold text-primary">
                Total Accepted Orders
            </div>
            <div class="card-body">
                <h1>{{ $total_accepted_orders }}</h1>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-center">
            <div class="card-header fw-bold text-primary">
                Total Rejected Orders
            </div>
            <div class="card-body">
                <h1>{{ $total_rejected_orders }}</h1>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-center">
            <div class="card-header fw-bold text-primary">
                Total Shipped Orders
            </div>
            <div class="card-body">
                <h1>{{ $total_shipped_orders }}</h1>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-center">
            <div class="card-header fw-bold text-primary">
                Total Delivered Orders
            </div>
            <div class="card-body">
                <h1>{{ $total_delivered_orders }}</h1>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-center">
            <div class="card-header fw-bold text-primary">
                Total Customers
            </div>
            <div class="card-body">
                <h1>{{ $total_users }}</h1>
            </div>
        </div>
    </div>
</div>
@endsection