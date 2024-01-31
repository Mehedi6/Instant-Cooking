@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/Posts')}}">Home</a></li>
              <li class="breadcrumb-item active">
                <a href="{{route('Posts.index')}}">Post List</a>
              </li>
              <li class="breadcrumb-item active"> Edit post</li>

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
                  {{-- <h3 class="card-title">Edit post {{$Posts->name}}</h3> --}}
                  
                  <a href="{{route('Posts.index')}}" class="btn btn-primary">Go Back post list</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                @if(session('success'))
                <div class="btn btn-success">{{ session('success') }}</div>
                @endif
                @if(session('error'))
                    <div class="btn btn-danger">{{ session('error') }}</div>
                @endif
                {{-- {{ route('update-data', $data->id) }} name route --}}
                <form action="/UpdatePosts/{{$posts->id}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="card-body">
                    <div class="form-group">
                      <label >Receipe Name</label>
                      <input type="text" value="{{$posts->title}}" name="title" class="form-control">
                      @error('title')
                      {{$message}}
                      @enderror
                    </div>
                    <div class="form-group">
                      <label >Ingridients</label>
                      
                      <input type="text" value="{{$posts->sub_title}}" name="subtitle" class="form-control">
                      @error('sub_title')
                      {{$message}}
                      @enderror
                    </div>


                    <div class="mb-3">
                      <label class="form-label">Select Category</label>
                        <select class="form-control" name="category" id="category">
                          <option value="" selected>Select Category</option>
                          @foreach ($categories as $item)

                            <option value="{{$item->id}}"  >{{$item->name}}</option>

                          @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                      <label for="">Image</label>
                      <input type="file"  name="image" id="image" class="form-control">
                      @error('image')
                      {{$message}}
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label > Old Image</label>
                      <br>
                      <img style="width:300px" src="{{asset('storage/posts')}}/{{$posts->image}}" class="img-fluid"  alt="photos">
                    </div>
                    <div class="col-sm-6">
                      <div class="mb-3">
                          <label for="">Video Link</label>
                          <input type="text" value="{{$item->video}}" name="video" id="video"
                              class="form-control">
                      </div>
                  </div>
                  
                  <div class="col-sm-6">
                      <div class="mb-3">
                          <label for="">Cooking Time</label>
                          <input type="text" value="{{$posts->cookingtime}}" name="cookingtime" id="time"
                              class="form-control">
                      </div>
                  </div>

                  <div class="col-sm-6">
                      <div class="mb-3">
                          <label for="">calories</label>
                          <input type="text" value="{{$posts->calories}}" name="calories" id="calories"
                              class="form-control">
                      </div>
                  </div>
                  

                    <div class="form-group">
                      <label>post Description</label>
                      <textarea name="discription" id="discription" cols="30" rows="4" class="form-control">{{$posts->discription}} </textarea>
                    </div>
                   
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update post</button>
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
      $('#discription').summernote({
        placeholder: 'Hello Bootstrap 4',
        tabsize: 2,
        height: 100
      });
    </script>
@endsection