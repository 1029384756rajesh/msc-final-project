@extends("admin.base")

@section("content")
<div class="row">
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


    <div class="card text-center font-bold">
        <div class="card-header text-indigo-600">
            Total Orders
        </div>
        <div class="card-body text-3xl">
            <h1>{{ $total_orders }}</h1>
        </div>
    </div>

    <div class="card text-center font-bold">
        <div class="card-header text-indigo-600">
            Total Placed Orders
        </div>
        <div class="card-body text-3xl">
            <h1>{{ $total_placed_orders }}</h1>
        </div>
    </div>

    <div class="card text-center font-bold">
        <div class="card-header text-indigo-600">
            Total Accepted Orders
        </div>
        <div class="card-body text-3xl">
            <h1>{{ $total_accepted_orders }}</h1>
        </div>
    </div>

    <div class="card text-center font-bold">
        <div class="card-header text-indigo-600">
            Total Rejected Orders
        </div>
        <div class="card-body text-3xl">
            <h1>{{ $total_rejected_orders }}</h1>
        </div>
    </div>

    <div class="card text-center font-bold">
        <div class="card-header text-indigo-600">
            Total Shipped Orders
        </div>
        <div class="card-body text-3xl">
            <h1>{{ $total_shipped_orders }}</h1>
        </div>
    </div>

    <div class="card text-center font-bold">
        <div class="card-header font-bold text-indigo-600">
            Total Delivered Orders
        </div>
        <div class="card-body text-3xl font-bold">
            <h1>{{ $total_delivered_orders }}</h1>
        </div>
    </div>

    <div class="card text-center font-bold">
        <div class="card-header text-indigo-600">
            Total Customers
        </div>
        <div class="card-body text-3xl">
            <h1>{{ $total_users }}</h1>
        </div>
    </div>
</div>
@endsection