@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('home')}}">Home </a></li>
                    <li class="breadcrumb-item active">
                        <a href="{{route('Posts.index')}}">post List </a>
                    </li>
                    <li class="breadcrumb-item active"> show post</li>

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
                            <h3 class="card-title">view post</h3>

                            <a href="{{route('Posts.index')}}" class="btn btn-primary">Go Back post list</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        @include('include.errors')
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td scope="row" style="width: 250px">Recipe Name</td>
                                    <td>{{$posts->title}}</td>
                                </tr>
                                <tr>
                                    <td scope="row" style="width: 250px">Recipe Ingredients</td>
                                    <td>{{$posts->sub_title}}</td>
                                </tr>
                                <tr>
                                    <td scope="row" style="width: 250px">ID</td>
                                    <td>{{$posts->id}}</td>
                                </tr>
                                {{--<tr>
                                    <td scope="row" style="width: 250px">Slug</td>
                                    <td>{{$posts->slug}}</td>
                                </tr> --}}
                                <tr>
                                    <td scope="row" style="width: 250px">Image</td>
                                    <td>{{$posts->image}}</td>
                                </tr>
                                 <tr>
                                    <td scope="row" style="width: 250px">Image</td>
                                    <td>
                                      <img src="{{asset('storage/posts')}}/{{$posts->image}}" style="width:400px; " alt="photos">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Video

                                    </td>
                                    <td>
                                    <iframe width="200"  src="{{$posts->video}}" title="YouTube video player"
                                        frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        allowfullscreen></iframe>
                                    </td>
                                </tr>
                               



                                {{-- <tr>
                                    <td scope="row" style="width: 250px">Recipe Discription</td>
                                    <td>{{$posts->discription}}</td>
                                </tr> --}}
                                <tr>
                                  <td scope="row" style="width: 250px">Recipe Discription</td>
                                  {{-- html tag gula dekta --}}
                                    <td>{!! $posts->discription !!}</td>
                                </tr>
                                <tr>
                                    <td scope="row" style="width: 250px">Title</td>
                                    <td>{{$posts->cookingtime}}</td>
                                </tr>
                                <tr>
                                    <td scope="row" style="width: 250px">Category ID</td>
                                    <td>{{$posts->category_id}}</td>
                                </tr>
                                <tr>
                                    <td scope="row" style="width: 250px">Category Name</td>
                                    <td>{{$posts->category->name}}</td>
                                </tr>
                                <tr>
                                    <td scope="row" style="width: 250px">User Id</td>
                                    <td>{{$posts->user_id}}</td>
                                </tr>
                                <tr>
                                    <td scope="row" style="width: 250px">Calories</td>
                                    <td>{{$posts->calories}}</td>
                                </tr>
                               

                                {{-- <tr>
                                    <td scope="row" style="width: 250px">Author Name</td>
                                    <td>{{$posts->user->name}}</td>
                                </tr> --}}
                                {{-- <tr>
                                  <td scope="row" style="width: 250px">Post tag</td>
                                  <td>--}}
                                    {{-- @foreach ($posts ->tags as $tag)
                                        <span class="badge badge-primary">{{$tag->name}}</span>
                                    @endforeach --}}
                                  </td>
                                </tr>
                             {{--  <tr>
                                    <td scope="row" style="width: 250px">Published At</td>
                                    <td>{{$posts->published_at}}</td>
                                </tr>
                                <tr>
                                    <td scope="row" style="width: 250px">Create Date</td>
                                    <td>{{$posts->created_at}}</td>
                                </tr>

                                <tr>
                                    <td scope="row" style="width: 250px">Update Date</td>
                                    <td>{{$posts->updated_at}}</td>
                                </tr>--}}


                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
