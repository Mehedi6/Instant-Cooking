@include('frontend.layout.header')
<section class="dietsection">
    <div class=" pt-5 pb-5">
        <div class="container">
            <div class="textbox text-center">
                <h2 class="text-center">SHOW DIET LIST</h2>
            </div>
        </div>
    </div>
</section>
<section class="dietcategory categorylisttable pt-4">
    <div class="container">
        <div class="table-responsive">
        <table class="table table-primary display" id="myTable">
         {{-- <table class="table table-primary"> --}}
            
                <thead>
                    <tr>
                        <th scope="col">SL NO</th>
                        <th scope="col">Recipe Name</th>
                        <th scope="col">Ingridients</th>
                        <th scope="col">Full Receipe</th>
                        <th scope="col" class="imagebox">Image</th>
                        <th scope="col">Video</th>
                        <th scope="col">Cooking Time</th>
                        <th scope="col">Calories</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1 ?>
                    @foreach ($posts as $key => $item)
                    <tr class="">
                        <td scope="row">{{$i++}}</td>
                        <td>{{$item->title}}</td>
                        <td>{{Str::limit($item->sub_title, 80)}}</td>
                        <td>
                            {{Str::limit($item->discription, 120)}}
                            <p style="margin: 0px;">
                                <a class="readmorelink" style="color:green; text-decoration: none;"
                                    href="{{route('showsinglepageuser',[$item->id])}}">Read More</a>
                            </p>
                        </td>
                        <td>
                            <img class="image" width="250px" src="{{asset('storage/posts')}}/{{$item->image}}" alt="" width="300px">
                        </td>
                        <td>
                            <iframe width="300" src="{{$item->video}}" title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>

                        </td>
                        <td>{{$item->cookingtime}}</td>
                        <td>{{$item->calories}}</td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@include('frontend.layout.footer')
