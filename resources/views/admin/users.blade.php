@extends("admin.base")

@section("head")
    <title>Customers</title>
@endsection

@section("content")
<div class="card">
    <div class="card-header fw-bold text-primary">Customers</div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Since</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($users) == 0)
                        <tr>
                            <td colspan="4" class="text-center">No Users Found</td>
                        </tr>
                    @endif

                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>

                            <td>{{ $user->email }}</td>

                            <td>{{ date("d-m-Y", strtotime($user->created_at))}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection