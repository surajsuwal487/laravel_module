@extends('blog::layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="wrapper">
  <div class="content-wrapper">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Update Product</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="{{ url('products/update-product/'.$product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
          <div class="form-group">
            <label for="productName">Product Name</label>
            <input type="text" class="form-control" value="{{ $product->name }}" name="name">
            @error('name')
            <p class="text-danger">{{ $message }} </p>
            @enderror
          </div>
          <div class="form-group">
            <label for="productName">Category</label>
            <select name="category_id" id="" class="form-control">
                @foreach ($categories as $item )
                    <option value="{{ $item->id }}"
                        {{ $product->category_id == $item->id ? 'selected' : '' }}
                      >{{ $item->name }}</option>
                @endforeach
            </select>
            @error('category_id')
            <p class="text-danger">{{ $message }} </p>
            @enderror
          </div>
          {{-- <div class="form-group">
            <label for="productName">Category</label>
            <input type="text" class="form-control" value="{{ $product->category_id }}" name="category_id">
            @error('category_id')
            <p class="text-danger">{{ $message }} </p>
            @enderror
          </div> --}}
          <div class="form-group">
            <label for="price">Product Price</label>
            <input type="text" class="form-control" value="{{ $product->price }}" name="price">
            @error('price')
            <p class="text-danger">{{ $message }} </p>
            @enderror
          </div>
          <div class="form-group">
            <label for="productDescription">Product Description</label>
            <input type="text" class="form-control" value="{{ $product->description }}" name="description">
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