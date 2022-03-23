@extends('blog::layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="wrapper">
  <div class="content-wrapper">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Create Product</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="{{ url('products/add-product') }}" method="POST">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="productName">Product Name</label>
            <input type="text" class="form-control" placeholder="Enter Product Name" name="name">
            @error('name')
            <p class="text-danger">{{ $message }} </p>
            @enderror
          </div>
          <div class="form-group">
            <label for="productName">Category</label>
            <select name="category_id" id="" class="form-control">
                @foreach ($categories as $item )
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
            @error('category_id')
            <p class="text-danger">{{ $message }} </p>
            @enderror
          </div>
          <div class="form-group">
            <label for="price">Product Price</label>
            <input type="text" class="form-control" placeholder="Enter Product Price" name="price">
            @error('price')
            <p class="text-danger">{{ $message }} </p>
            @enderror
          </div>
          <div class="form-group">
            <label for="productDescription">Product Description</label>
            <input type="text" class="form-control" placeholder="Enter Product Descripiton" name="description">
            @error('description')
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