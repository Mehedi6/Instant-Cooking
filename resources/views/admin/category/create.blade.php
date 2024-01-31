@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/Posts')}}">Home</a></li>
              <li class="breadcrumb-item active">
                <a href="{{route('Category.index')}}">Category List</a>
              </li>
              <li class="breadcrumb-item active"> Create Category</li>

            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card ">
              <div class="card-header  ">
                <div class="d-flex justify-content-between align-items-center">
                  <h3 class="card-title">Catagory List</h3>
                  
                  <a href="{{route('Category.index')}}" class="btn btn-primary">Go Back Category list</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                @include('include.errors')
                <form action="{{route('Category.store')}}" method="POST">
                  @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Category Name</label>
                      <input type="text" name="name" class="form-control">
                    </div>
                    {{-- <div class="form-group">
                      <label for="exampleInputPassword1">Category Slug</label>
                      <input type="text" name="slug" class="form-control">
                    </div> --}}

                    <div class="form-group">
                      <label for="exampleInputPassword1">Category Description</label>
                      <textarea name="description" id="description" cols="30" rows="4" class="form-control"></textarea>
                    </div>
                   
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection