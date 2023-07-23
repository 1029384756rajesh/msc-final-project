@extends("admin.base")

@section("head")
    <title>Products</title>
@endsection

@section("content")
<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <span class="fw-bold text-primary">Products</span>
        <a href="/admin/products/create" class="btn btn-sm btn-primary">Add New</a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" style="min-width: 1000px">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Short Description</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($products) == 0)
                        <tr>
                            <td colspan="4" class="text-center">No Category Found</td>
                        </tr>
                    @endif

                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>

                            <td>{{ $product->price }}</td>

                            <td>{{ $product->stock }}</td>

                            <td>{{ $product->short_description }}</td>

                            <td>{{ $product->category?->name }}</td>

                            <td>
                                <img width="50px" height="50px" src="/storage/{{ $product->image_url }}" class="img-fluid">
                            </td>
                        
                            <td>
                                <div class="d-flex align-items-center gap-1">
                                    <a href="/admin/products/{{ $product->id }}/edit" class="btn btn-sm btn-warning">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <form action="/admin/products/{{ $product->id }}" method="post">
                                        @csrf 
                                        @method("delete")

                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection