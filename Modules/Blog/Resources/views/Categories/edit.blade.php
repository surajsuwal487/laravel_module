@extends('blog::layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="wrapper">
  <div class="content-wrapper">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Categories</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="{{ url('categories/update-category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="productName">Category Name</label>
            <input type="text" class="form-control" value="{{ $category->name }}" name="name">
            @error('name')
            <p class="text-danger">{{ $message }} </p>
            @enderror
          </div>
          <div class="form-group">
            <label for="price">Category Description</label>
            <input type="text" class="form-control" value="{{ $category->description }}"  name="description">
            @error('description')
            <p class="text-danger">{{ $message }} </p>
            @enderror
          </div>
          <label for="image">Your Image Here</label>
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="exampleInputFile" value="{{ $category->image_path }}" name="image_path">
            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
            <img src="{{ asset('images/'.$category->image_path) }}" width="40px" height="40px" alt="">
            @error('image_path')
            <p class="text-danger">{{ $message }} </p>
            @enderror
          </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
      @if (session('status'))
      <h6 class="alert alert-success">{{ session('status') }}</h6>
      @endif
    </div>
  </div>
</div>
<!-- /.content-wrapper -->

@endsection