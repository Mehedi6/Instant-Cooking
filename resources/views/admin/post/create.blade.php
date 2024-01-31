@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">
                <a href="{{route('Posts.index')}}">Post List</a>
              </li>
              <li class="breadcrumb-item active"> Create post</li>

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
                  <h3 class="card-title">Post List</h3>
                  
                  <a href="{{route('Posts.index')}}" class="btn btn-primary">Go Back post list</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                @include('include.errors')
                <form action="{{route('Posts.store')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label >Receipe Name</label>
                      <input type="text" name="title"  value="{{old('title')}}" class="form-control">
                    </div>
                    <div class="form-group">
                      <label >Ingredients</label>
                      <input type="text" value="{{old('sub_title')}}" name="sub_title" class="form-control">
                    </div>

                    
                    <div class="mb-3">
                       {{-- postcontroller -> category table --}}
                      <label class="form-label">Select Category</label>
                        <select class="form-control" name="category" id="category" >
                            <option value="" selected>Select Category</option>
                          @foreach ($categories as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                          @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                      <label for="">Image</label>
                      <input type="file" name="image" id="image" class="form-control">
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="">Video Link</label>
                            <input type="text" name="video" id="video" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="mb-3">
                          <label for="">Cooking Time</label>
                          <input type="text" name="cookingtime" id="cookingtime" class="form-control">
                      </div>
                    <div class="col-sm-6">
                      <div class="mb-3">
                          <label for="">Calories</label>
                          <input type="text" name="calories" id="calories" class="form-control">
                      </div>
                    </div>
                    

                    <div class="form-group">
                      <label for="exampleInputPassword1">Description</label>
                      <textarea name="discription" id="description" cols="30" rows="4" class="form-control">{{old('discription')}}</textarea>
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

@section('style')
    <link rel="stylesheet" href="{{asset('/admin/css/summernote-bs4.min.css')}}">
@endsection

@section('script')
    <script src="{{asset('/admin/js/summernote-bs4.min.js')}}"></script>
    <script>
      $('#description').summernote({
        placeholder: 'Hello Bootstrap 4',
        tabsize: 2,
        height: 100
      });
    </script>
@endsection