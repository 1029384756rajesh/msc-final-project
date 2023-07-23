@extends("base")

@section("head")
    <title>Orders</title>
@endsection

@section("content")
<div class="container my-4">
    <div class="card">
        <div class="card-header fw-bold text-primary">My Orders</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Order No</th>
                            <th>Status</th>
                            <th>Placed At</th>
                            <th>Last Updated</th>
                            <th>Total Products</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>
                                    @switch($order->status)
                                        @case("Delivered")
                                            <span class="badge bg-success">{{ $order->status }}</span>
                                            @break

                                        @case("Shipped")
                                            <span class="badge bg-warning">{{ $order->status }}</span>
                                            @break

                                        @case("Canceled")
                                            <span class="badge bg-danger">{{ $order->status }}</span>
                                            @break

                                        @default
                                            <span class="badge bg-secondary">{{ $order->status }}</span>
                                    @endswitch
                                </td>
                                <td>{{ date("d-m-Y H:i A", strtotime($order->created_at)) }}</td>
                                <td>{{ date("d-m-Y H:i A", strtotime($order->updated_at)) }}</td>
                                <td>{{ count($order->products) }}</td>
                                <td>
                                    <a href="/orders/{{ $order->id }}" class="btn btn-outline-secondary btn-sm">View</a>
                                </td>
                            </tr>                            
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection