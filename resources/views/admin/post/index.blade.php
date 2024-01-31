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
                            <h3 class="card-title">Diet Post List</h3>
                            <a href="{{route('Posts.create')}}" class="btn btn-primary">Create post</a>
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
                        <table class="table table-striped display" >
                            <thead>
                                <tr>
                                    <th style="width: 30px">SL No</th>
                                    <th style="width: 400px">Receipe Name</th>
                                    <th >Image</th>
                                    <th>Category Name</th>
                                    <th style="width: 40px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($posts->count()>0)
                                @php
                                    $i=1;
                                @endphp
                                @foreach ($posts as $item)

                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$item->title}}</td>
                                    <td>
                                        <div style="width: 60px; max-height:60px; object-fit:cover;">
                                            <img src="{{asset('storage/posts')}}/{{$item->image}}" class="img-fluid"
                                                alt="photo">
                                        </div>
                                    </td>
                                   <td>
                                    {{$item->category->name}}
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="/editPosts/{{$item->id}}" class="btn btn-primary me-2"><i
                                                    class="fas fa-edit"></i></a>

                                            <form action="{{ route('Posts.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger me-2" type="submit"><i
                                                        class="fa-solid fa-trash"></i></button>
                                            </form>


                                            <a href="{{route('Posts.show',[$item->id])}}"
                                                class="btn btn-success me-2"><i class="fas fa-eye"></i></a>

                                        </div>
                                    </td>


                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="9">
                                        <h5 class="text-center">No post Found</h5>
                                    </td>
                                </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
