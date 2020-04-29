@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb" style="margin-top: 20px;">
            <div class="pull-left">
                <h2>Update Book</h2>
            </div>
            @include('partials.message')
            <div class="pull-right">
                <a href="{{route('book.index')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <br>
    <form action="{{route('book.update',$book->id)}}" method="post" role="form" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group{{$errors->has('name')?' has-error':''}}">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $book->name }}" class="form-control" placeholder="name">
                    <span class="text-danger">{{$errors->first('name')}}</span>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group{{$errors->has('title')?' has-error':''}}">
                    <strong>Title:</strong>
                    <input type="text" name="title" value="{{ $book->title }}" class="form-control" placeholder="title">
                    <span class="text-danger">{{$errors->first('title')}}</span>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group{{$errors->has('description')?' has-error':''}}">
                    <strong>Description:</strong>
                    <input type="text" class="form-control" name="description" id="description" value="{{ $book->description }}"
                        class="form-control" placeholder="description">
                    <span class="text-danger">{{$errors->first('description')}}</span>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">

                <input type="hidden" value="0" name="active">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" value="1" class="custom-control-input" id="active" name="active">
                    <label class="custom-control-label" for="active">Active</label>
                </div>
            </div>

            <br>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group{{$errors->has('category')?' has-error':''}}">
                    <strong>Category:</strong>
                    <select class="form-control input-width" name="category">
                        @foreach ($category as $types)
                        <option value="{{ $types->id }}" @if(old('category')==$types->category_id)
                            {{ "selected" }}
                            @endif
                            >{{ $types->title }}</option>
                        @endforeach
                    </select>
                    <span class="text-danger">{{$errors->first('category')}}</span>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
</div>
@endsection
@push('ckeditor-js')
<script src="https://cdn.ckeditor.com/ckeditor5/18.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#description' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endpush
