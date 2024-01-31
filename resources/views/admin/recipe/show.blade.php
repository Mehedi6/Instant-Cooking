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

                            <a href="{{route('Recipe.index')}}" class="btn btn-primary">Go Back post list</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        @include('include.errors')
                        <table class="table">
                            <tbody>
                                
                                <tr>
                                    <td scope="row" style="width: 250px">Title</td>
                                    <td>{{$recipe->ing}}</td>
                                </tr>
                                <tr>
                                    <td scope="row" style="width: 250px">ID</td>
                                    <td>{{$recipe->id}}</td>
                                </tr>
                              
                                <tr>
                                    <td scope="row" style="width: 250px">Image</td>
                                    <td>{{$recipe->image}}</td>
                                </tr>
                                 <tr>
                                    <td scope="row" style="width: 250px">Image</td>
                                    <td>
                                      <img src="{{asset('storage/recipe')}}/{{$recipe->image}}" style="width:400px; " alt="photos">
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row" style="width: 250px">Nutritional Value</td>
                                    <td>{{$recipe->nutrition}}</td>
                                </tr>
                                <tr>
                                    <td scope="row" style="width: 250px">External Link</td>
                                    <td>{{$recipe->link}}</td>
                                </tr>
                                <tr>
                                  <td scope="row" style="width: 250px">Discription</td>
                                  {{-- html tag gula dekta --}}
                                    <td>{{$recipe->recipe_description}}</td>
                                </tr>
                                <tr>
                                    <td>Video

                                    </td>
                                    <td>
                                        <iframe width="200"  src="{{$recipe->video}}" title="YouTube video player"
                                            frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                            allowfullscreen></iframe>
                                    </td>
                                </tr>

                                <tr>
                                    <td scope="row" style="width: 250px">Category</td>
                                    <td>{{$recipe->category}}</td>
                                </tr>

                                
                                    {{-- @foreach ($recipe ->tags as $tag)
                                        <span class="badge badge-primary">{{$tag->name}}</span>
                                    @endforeach --}}
                                  </td>
                                </tr>
                                <tr>
                                    <td scope="row" style="width: 250px">Published At</td>
                                    <td>{{$recipe->published_at}}</td>
                                </tr>
                                <tr>
                                    <td scope="row" style="width: 250px">Create Date</td>
                                    <td>{{$recipe->created_at}}</td>
                                </tr>

                                <tr>
                                    <td scope="row" style="width: 250px">Update Date</td>
                                    <td>{{$recipe->updated_at}}</td>
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
