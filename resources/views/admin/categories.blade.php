@extends("admin.base")

@section("head")
    <title>Categories</title>
@endsection

@section("content")
<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <span class="fw-bold text-primary">Categories</span>
        <a href="/admin/categories/create" class="btn btn-sm btn-primary">Add New</a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <div class="table-responsive">
                <table class="table table-bordered" style="min-width: 1024px">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($categories) == 0)
                            <tr>
                                <td colspan="4" class="text-center">No Category Found</td>
                            </tr>
                        @endif
    
                        @foreach ($categories as $category)
                            <tr>
                                <td>
                                    {{ $category->name }}
                                </td>

                                <td>
                                    <img src="/storage/{{ $category->image_url }}" width="60px" height="60px" class="img-fluid">
                                </td>
                                
                                <td>
                                    <div class="d-flex align-items-center gap-1">
                                        <a href="/admin/categories/{{ $category->id }}/edit" class="btn btn-sm btn-warning">
                                            <i class="fa fa-edit"></i>
                                        </a>
    
                                        <form action="/admin/categories/{{ $category->id }}" method="post">
                                            @csrf
                                            @method("delete")
    
                                            <button class="btn btn-sm btn-danger">
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
</div>
@endsection