@extends("admin.base")

@section("head")
    <title>Sliders</title>
@endsection

@section("content")
<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <span class="fw-bold text-primary">Sliders</span>
        <a href="/admin/sliders/create" class="btn btn-sm btn-primary">Add New</a>
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if (count($sliders) == 0)
                    <tr>
                        <td colspan="3" class="text-center">No Sliders Found</td>
                    </tr>
                @endif

                @foreach ($sliders as $slider)
                    <tr>
                        <td>
                            <img src="/storage/{{ $slider->image_url }}" height="100px" width="100px" class="img-fluid">
                        </td>
                    
                        <td>
                            <form action="/admin/sliders/{{ $slider->id }}" method="post">
                                @csrf 
                                @method("delete")

                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection