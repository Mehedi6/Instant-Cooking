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
                            <h3 class="card-title">view post</h3>

                            <a href="{{route('showcategory')}}" class="btn btn-primary">Go Back list</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        @include('include.errors')
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td scope="row" style="width: 250px">Title</td>
                                    <td>{{$post->title}}</td>
                                </tr>
                                <tr>
                                    <td scope="row" style="width: 250px">ID</td>
                                    <td>{{$post->id}}</td>
                                </tr>
                                <tr>
                                    <td scope="row" style="width: 250px">Slug</td>
                                    <td>{{$post->slug}}</td>
                                </tr>
                                <tr>
                                    <td scope="row" style="width: 250px">Image</td>
                                    <td>{{$post->image}}</td>
                                </tr>
                                 <tr>
                                    <td scope="row" style="width: 250px">Image</td>
                                    <td>
                                      <img src="{{asset('storage/posts')}}/{{$post->image}}" style="width:400px; " alt="photos">
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row" style="width: 250px">Discription</td>
                                    <td>{{$post->discription}}</td>
                                </tr>
                                <tr>
                                  <td scope="row" style="width: 250px">Discription</td>
                                  {{-- html tag gula dekta --}}
                                    <td>{!! $post->discription !!}</td>
                                </tr>
                                <tr>
                                    <td scope="row" style="width: 250px">Category ID</td>
                                    <td>{{$post->category_id}}</td>
                                </tr>
                                <tr>
                                    <td scope="row" style="width: 250px">Category Name</td>
                                    <td>{{$post->category->name}}</td>
                                </tr>
                                <tr>
                                    <td scope="row" style="width: 250px">User Id</td>
                                    <td>{{$post->user_id}}</td>
                                </tr>
                                <tr>
                                    <td scope="row" style="width: 250px">Author Name</td>
                                    <td>{{$post->user->name}}</td>
                                </tr>
                                <tr>
                                  <td scope="row" style="width: 250px">Post tag</td>
                                  <td>
                                    {{-- @foreach ($posts ->tags as $tag)
                                        <span class="badge badge-primary">{{$tag->name}}</span>
                                    @endforeach --}}
                                  </td>
                                </tr>
                                <tr>
                                    <td scope="row" style="width: 250px">Published At</td>
                                    <td>{{$post->published_at}}</td>
                                </tr>
                                <tr>
                                    <td scope="row" style="width: 250px">Create Date</td>
                                    <td>{{$post->created_at}}</td>
                                </tr>

                                <tr>
                                    <td scope="row" style="width: 250px">Update Date</td>
                                    <td>{{$post->updated_at}}</td>
                                </tr>


                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
