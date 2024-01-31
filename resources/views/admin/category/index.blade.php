@extends('layouts.admin')

@section('content')
    <!-- /.content-header -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card ">
              <div class="card-header  ">
                <div class="d-flex justify-content-between align-items-center">
                  <h3 class="card-title">Diet Catagory List</h3>
                  <a href="{{route('Category.create')}}" class="btn btn-primary">Create Category</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Slug</th>
                      <th>Post Count</th>
                      <th>Discription</th>
                      <th style="width: 40px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($catagories->count()>0)
                    @foreach ($catagories as $item)
                    <tr>
                      <td>{{$item->id}}</td>
                      <td>{{$item->name}}</td>
                      <td>{{$item->slug}}</td>
                      <td>{{$item->id}}</td>
                      <td>{{$item->description}}</td>

                      <td>
                       <div class="d-flex">
                        <a href="{{route('Category.edit',[$item->id])}}" class="btn btn-primary ml-2"><i class="fas fa-edit"></i></a>

                        <form action="/Category/{{$item->id}}" class="ml-3" method="POST">
                          @method('DELETE')
                          @csrf                          
                          <button type="submit" class="btn btn-md btn-danger" onclick="return confirm('Are you sure you want to delete this resource?')"><i class="fas fa-trash"></i></button>
                        </form>
                        {{-- <a href="{{route('Category.show',[$item->id])}}" class="btn btn-success ml-2"><i class="fas fa-eye"></i></a> --}}

                       </div>
                      </td>


                    </tr>
                    @endforeach
                 
                    @else
                    <tr>
                      <td colspan="6">
                        <h5 class="text-center">No Category Found</h5>
                      </td>
                    </tr>


                    @endif
                    
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                {{$catagories->links()}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection