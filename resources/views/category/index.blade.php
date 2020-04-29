@extends('layouts.app')

@section('content')
@if($message=Session::get('success'))
<div class="alert alert-success">
    <p>{{$message}}</p>
</div>
@endif
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 ">List Category</h1>
    <div class="col-lg-12 margin-tb" style="margin-top: 20px;">
        <div class="pull-right">
            <a href="{{route('category.create')}}" class="btn btn-success ">Create New Category</a>
        </div>
        <br />
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Category </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Created_at</th>
                            <th>Update_at</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($category) == 0)
                        <tr>
                            <td colspan="6" class="text-center">No data found</td>
                        </tr>
                        @else
                        @foreach($category as $value)

                        <tr>
                            <td>{{$value->title}}</td>
                            <td>{{$value->description}}</td>
                            <td>{{$value->created_at}}</td>
                            <td>{{$value->updated_at}}</td>
                            <td><a href="{{ route('category.edit', $value->id) }}" class="btn btn-warning" type="submit"
                                    onclick="return confirm('Are you sure to update?')"><i class="fa fa-window-restore"
                                        title="Edit"></i>Edit</a></td>
                            <td>
                                <form action="{{ route('category.destroy', $value->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit"
                                        onclick="return confirm('Are you sure to delete?')"><i class="fa fa-backspace"
                                            title="Delete"></i>Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection
