@extends('blog::layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Categories List</h3>
            <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                <div class="input-group-append">
                  <button type="submit" class="btn btn-default">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div col-4>
            <a class="btn btn-primary" href="{{ url('categories/add-category') }}" role="button">Create New </a>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0" id="product-table">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th>Category Name</th>
                  <th>Description</th>
                  <th>Image</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              @foreach ( $categories as $category)
              <tbody>
                <tr>
                  <td>{{ $category->name }}</td>
                  <td>{{ $category->description}}</td>
                  <td><img src="{{url('images/'.$category->image_path )}}" height="50px" width="50px"/></td>
                  <td>
                      <a href="{{ url('categories/edit-category/'.$category->id) }}"><i class="fas fa-edit"></i> Edit</a>
   
                  </td>
                  <td>
                    <form action="{{ url('categories/delete-category/'.$category->id) }}" method="POST">
                      @csrf
                      {{-- @method('DELETE') --}}
                      <button type="submit" class="btn btn-danger" onclick="return confirm(&quot Are you sure you want to delete your product list also;Confirm delete?&quot;)">Delete</button>
                    </form>
                    {{-- <a href="{{ url('categories/delete-category/'.$category->id) }}"><i class="fas fa-trash" style="color: red">Delete</i></a> --}}
                    </form>
                  </td>
                </tr>
              </tbody>
              @endforeach
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      @if (session('status'))
      <h6 class="alert alert-success">{{ session('status') }}</h6>
      @endif
    </div>
</div>
<!-- /.content-wrapper -->

@endsection