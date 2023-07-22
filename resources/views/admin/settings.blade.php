@extends("admin.base")

@section("head")
    <title>Settings</title>
@endsection

@section("content")
<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <span class="fw-bold text-primary">Setting</span>
        <a href="/admin/settings/edit" class="btn btn-sm btn-primary">Edit Settings</a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <td>About</td>
                    <td>{!! $settings->about !!}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{ $settings->email }}</td>
                </tr>
                <tr>
                    <td>Mobile</td>
                    <td>{{ $settings->mobile }}</td>
                </tr>
                <tr>
                    <td>Tax</td>
                    <td>{{ $settings->tax }}%</td>
                </tr>
                <tr>
                    <td>Shipping Cost</td>
                    <td>{{ $settings->shipping_cost }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection