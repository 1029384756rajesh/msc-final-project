@extends("admin.base")

@section("head")
    <title>Orders</title>
@endsection

@section("content")
    <div class="card">
        <div class="card-header fw-bold text-primary">Orders</div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" style="min-width: 1024px">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Total Products</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                      @if (count($orders) == 0)
                          <tr>
                            <td colspan="7" class="text-center">No Orders Found</td>
                          </tr>
                      @endif
                      
                      @foreach ($orders as $order)
                          <tr>
                              <td>{{ $order->id }}</td>
                              <td>{{ $order->user->email }}</td>
                              <td>{{ $order->status }}</td>
                              <td>{{ count($order->products) }}</td>
                              <td>{{ date("d-m-Y, H:i A", strtotime($order->created)) }}</td>
                              <td>
                                  <a href="/admin/orders/{{ $order->id }}" class="btn btn-sm btn-outline-secondary">View</a>
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