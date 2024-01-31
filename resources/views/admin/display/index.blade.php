@extends('layouts.admin')
@section('content')
<div class="container">
  <div class=" align-items-start">
    
    <div class="nav d-flex nav-pills me-3 mb-5 pt-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <button class=" btn btn-success mt-2 mb-2">
        <a href="{{route('showcategory')}}" style="color:#fff; text-decoration: none;">All Category</a>
      </button>
      @php
          $i=0
      @endphp
      @foreach ($category as $key => $item)
        <button class=" btn btn-success mt-2 mb-2 me-1 ms-1" id="v-pills-home-tab{{$i}}" data-bs-toggle="pill" data-bs-target="#v-pills-home{{$i}}" type="button" role="tab" aria-controls="v-pills-home{{$i}}" aria-selected="true">
          <a href="{{url('CategoryPost')}}/{{$item->id}}" style="color:#fff; text-decoration: none;">{{$item->name}}</a>
        </button>
      @endforeach    
    </div>

    <div class="tab-content" id="v-pills-tabContent">
      <div class="row">
        @foreach ($posts as $key => $item)           
            <div class="col-md-4">
              <div style="background-color: blanchedalmond; padding:20px; height:100%;" class="tab-pane fade show active" id="v-pills-home{{$i}}" role="tabpanel" aria-labelledby="v-pills-home-tab{{$i}}" tabindex="0">
                {{-- <p>{{$item->category->name}}</p> --}}
                <div class="recipename">
                  <img src="{{asset('storage/posts')}}/{{$item->image}}" alt="" width="100%" style="height: 250px; object-fit:cover;">
                </div>
                <p><b>Recipe Name:</b> {{$item->title}}</p>
                <p><b>Ingridients:</b> {{Str::limit($item->sub_title, 80)}}</p>
                <p><b>Full Receipe:</b> {{Str::limit($item->discription, 120)}}</p>
                <p style="margin: 0px;">
                  <a style="color:green; text-decoration: none;" href="{{route('showsinglepageadmin',[$item->id])}}">Read More >></a>
                </p>
              </div>
            </div>           
        @endforeach
      </div>
    </div>

  </div>
</div>
@endsection