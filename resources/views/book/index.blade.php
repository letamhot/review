@extends('layouts.app')

@section('content')
@if($message=Session::get('success'))
<div class="alert alert-success">
    <p>{{$message}}</p>
</div>
@endif
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 ">List Book</h1>
    <div class="col-lg-12 margin-tb" style="margin-top: 20px;">
        <div class="pull-right">
            <a href="{{route('book.create')}}" class="btn btn-success ">Create New book</a>
            <a href="{{route('book.active')}}" class="btn btn-success ">Book Active</a>
            <a href="{{route('book.inactive')}}" class="btn btn-success ">Book Inactive</a>
        </div>
        <br />
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Book </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th></th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Active</th>
                            <th>Category</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($book) == 0)
                        <tr>
                            <td colspan="8" class="text-center">No data found</td>
                        </tr>
                        @else
                        @foreach($book as $value)
                        <tr>
                            <td>{{$value->name}}</td>
                            <td>{{$value->title}}</td>
                            <td>{{$value->description}}</td>
                            @if($value->active == 1)
                            <td>Active</td>
                            @else
                            <td>Inactive</td>
                            @endif

                            <td>{{$value->category->title }}</td>
                            <td>{{$value->created_at}}</td>
                            <td>{{$value->updated_at}}</td>

                            <td><a href="{{ route('book.edit', $value->id) }}" class="btn btn-warning" type="submit" onclick="return confirm('Are you sure to update?')"><i
                                        class="fa fa-window-restore" title="Edit">Edit</i></a></td>
                            <td>
                                <form action="{{ route('book.destroy', $value->id) }}" method="POST">
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
