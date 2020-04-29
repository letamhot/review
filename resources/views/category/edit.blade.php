@extends('layouts.app')

@section('title', 'Category')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb" style="margin-top: 20px;">
            <div class="pull-left">
                <h2>Update Category</h2>
            </div>
            @include('partials.message')
            <div class="pull-right">
                <a href="{{route('category.index')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <br>
    <form action="{{route('category.update',$category->id)}}" method="post" role="form" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group{{$errors->has('title')?' has-error':''}}">
                    <strong>Title:</strong>
                    <input type="text" name="title" value="{{ $category->title }}" class="form-control"
                        placeholder="title">
                    <span class="text-danger">{{$errors->first('title')}}</span>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group{{$errors->has('description')?' has-error':''}}">
                    <strong>Description:</strong>
                    <input type="text" class="form-control" name="description" id="description" value="{{ $category->description }}"
                        class="form-control" placeholder="description">
                    <span class="text-danger">{{$errors->first('description')}}</span>
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
