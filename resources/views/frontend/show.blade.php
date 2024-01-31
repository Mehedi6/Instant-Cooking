@include('frontend.layout.header')
<section class="showdata">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 pt-5">
                <div class="card ">
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td scope="row" style="width: 250px">Recipe Name</td>
                                    <td>{{$post->title}}</td>
                                </tr>
                                <tr>
                                    <td scope="row" style="width: 250px">Ingredient</td>
                                    <td>{{$post->sub_title}}</td>
                                </tr>
                                {{-- <tr>
                                    <td scope="row" style="width: 250px">Slug</td>
                                    <td>{{$post->slug}}</td>
                                </tr> --}}

                                <tr>
                                    <td scope="row" style="width: 250px">Image</td>
                                    <td>
                                        <img src="{{asset('storage/posts')}}/{{$post->image}}" style="width:400px; "
                                            alt="photos">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Video</td>
                                    <td>
                                        <iframe width="200" src="{{$post->video}}" title="YouTube video player" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                            allowfullscreen></iframe>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row" style="width: 250px">Cooking Time</td>
                                    <td>{{$post->cookingtime}}</td>
                                </tr>
                                <tr>
                                    <td scope="row" style="width: 250px">Calories</td>
                                    <td>{{$post->calories}}</td>
                                </tr>
                                
                            
                            

                                {{-- <tr>
                                    <td scope="row" style="width: 250px">Description</td>
                                    <td>{{$post->discription}}</td>
                                </tr> --}}
                                <tr>
                                    <td scope="row" style="width: 250px">Description</td>
                                    {{-- html tag gula dekta --}}
                                    <td>{!! $post->discription !!}</td>
                                </tr>
                                {{-- <tr>
                                    <td scope="row" style="width: 250px">Category ID</td>
                                    <td>{{$post->category_id}}</td>
                                </tr> --}}
                                <tr>
                                    <td scope="row" style="width: 250px">Category Name</td>
                                    <td>{{$post->category->name}}</td>
                                </tr>

                                {{-- <tr>
                                    <td scope="row" style="width: 250px">Author Name</td>
                                    <td>{{$post->user->name}}</td>
                                </tr> --}}
                                {{-- <tr>
                                  <td scope="row" style="width: 250px">Post tag</td>
                                  <td>
                                    @foreach ($posts ->tags as $tag)
                                        <span class="badge badge-primary">{{$tag->name}}</span>
                                @endforeach
                                </td>
                                </tr> --}}
                                {{-- <tr>
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
                                </tr> --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('frontend.layout.footer')
