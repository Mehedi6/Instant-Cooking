@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              {{-- <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li> --}}
              <li class="breadcrumb-item active">
                <a href="{{route('Category.index')}}">Diet Category List</a>
              </li>
              <li class="breadcrumb-item active"> Edit Diet Category</li>

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
                  <h3 class="card-title">Edit Diet Category {{$Categories->name}}</h3>
                  
                  <a href="{{route('Category.index')}}" class="btn btn-primary">Go Back Category list</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                @include('include.errors')
                <form action="/Category/{{$Categories->id}}" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="card-body">
                    <div class="form-group">
                      <label >Category Name</label>
                      <input type="text" value="{{$Categories->name}}" name="name" class="form-control">
                    </div>   

                    <div class="form-group">
                      <label>Category Description</label>
                      <textarea name="description" id="description" cols="30" rows="4" class="form-control">{{$Categories->description}}</textarea>
                    </div>
                   
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update Category</button>
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