@extends('layouts.admin')

@section('content')
<head>
    <style>
    .card-body td{
            border: 3px solid red;
            max-width:150px;
            overflow:hidden;
            text-overflow:ellipsis;

        }
        </style>
</head>

<!-- /.content-header -->
<div class="content">

    <div class="row">
        
            <div class="card " style="overflow: scroll;">
                <div class="card-header  ">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-title">Recipe List</h3>
                        <a href="{{route('Recipe.create')}}" class="btn btn-primary">Add post</a>
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
                    <table class="table table-striped" >
                        <thead>
                            <tr>
                                <th >SL No</th>
                                <th >Receipe Name</th>
                                <th >Receipe Ingredients</th>
                                <th>Receipe description</th>
                                <th>Cooking Time</th>
                                <th>Image</th>
                                <th>Nutrinional Value</th>
                                <th>External Link</th>
                                <th>Category Name</th>
                                <th width="200px">Video</th>
                                {{-- <th>Ratings</th> --}}
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($recipes->count()>0)
                            @php
                            $i=1;
                            @endphp
                            @foreach ($recipes as $item)

                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$item->recipe_name}}</td>
                                <td>{{$item->ing}}</td>
                                <td>{{$item->recipe_description}}</td>
                                <td>{{$item->cookingtime}}</td>
                                <td>
                                    <div style="width: 60px; max-height:60px; object-fit:cover;">
                                        <img src="{{asset('storage/recipe')}}/{{$item->image}}" class="img-fluid"
                                            alt="photo">
                                    </div>
                                </td>
                                <td>{{$item->nutrition}}</td>
                                <td>{{$item->link}}</td>
                                <td>
                                    <iframe width="200"  src="{{$item->video}}" title="YouTube video player"
                                        frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        allowfullscreen></iframe>
                                </td>
                                {{-- <td>{{$item->Ratings}}</td> --}}
                                <td>{{$item->category}}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{route('recipe.edit',$item->id)}}" class="btn btn-primary me-2"><i
                                                class="fas fa-edit"></i></a>

                                        <form action="{{ route('recipe.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger me-2" type="submit"><i
                                                    class="fa-solid fa-trash"></i></button>
                                        </form>


                                        <a href="{{route('recipe.show',[$item->id])}}" class="btn btn-success me-2"><i
                                                class="fas fa-eye"></i></a>

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
    {{$recipes->links()}}
</div>
@endsection
