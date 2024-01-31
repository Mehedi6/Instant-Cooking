@include('frontend.layout.header')


<div id="top" class="content"> 

    <div class="search-form">
    <form method="GET" action="{{ route('explore') }}">
            <button type="submit" class="btn btn-light">Explore More Recipes!</button>
    </form>
    </div>
<div class="content recipesinglesection">
    <div class="container pt-5">
        <div class="row">

            <table class="table">
                <tbody>
                    <tr>
                        <td scope="row" style="width: 250px">Title</td>
                        <td>{{$recipe->RecipeName}}
                            <div>&nbsp;</div>
                            <div>
                                    <?php
                                    $star=1;
                                     while($star<=5){ 
                                        if($star<=$avgStarRating){ ?>
                                            <span>&#9733;</span>
                                    <?php } 
                                        else{?>    
                                        <span>&#9734;</span>
                                        <?php } ?>
                                     <?php $star++;} ?>
                                     ({{$ratingCount}})
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td scope="row" style="width: 250px">Title</td>
                        <td>{{$recipe->RecipeIngredients}}</td>
                    </tr>
                    <tr>
                        <td scope="row" style="width: 250px">ID</td>
                        <td>{{$recipe->id}}</td>
                    </tr>

                    <tr>
                        <td scope="row" style="width: 250px">Image</td>
                        <td>{{$recipe->Image}}</td>
                    </tr>
                    <tr>
                        <td scope="row" style="width: 250px">Image</td>
                        <td>
                            <img src="{{asset('storage/recipe')}}/{{$recipe->Image}}" style="width:400px; "
                                alt="photos">
                        </td>
                    </tr>
                    <tr>
                        <td scope="row" style="width: 250px">Discription</td>
                        <td>{{$recipe->RecipeDescription}}</td>
                    </tr>
                    <tr>
                        <td>Video</td>
                        <td>
                            <iframe width="200" src="{{$recipe->Video}}" title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                        </td>
                    </tr>
                    <tr>
                        <td scope="row" style="width: 250px">Category</td>
                        <td>{{$recipe->category}}</td>
                    </tr>
                    <tr>
                        <td scope="row" style="width: 250px">User Id</td>
                        <td>{{$recipe->user_id}}</td>
                    </tr>
                    <tr>
                        <td scope="row">Ratings</td>
                        <td>
                             @if ($recipe->Ratings==1)
                            <ul class="d-flex" style="list-style:none; ">
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-regular fa-star"></i></li>
                                <li><i class="fa-regular fa-star"></i></li>
                                <li><i class="fa-regular fa-star"></i></li>
                                <li><i class="fa-regular fa-star"></i></li>
                            </ul>
                            @endif
                            @if ($recipe->Ratings==2)
                            <ul class="d-flex" style="list-style:none; ">
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-regular fa-star"></i></li>
                                <li><i class="fa-regular fa-star"></i></li>
                                <li><i class="fa-regular fa-star"></i></li>
                            </ul>
                            @endif
                            @if ($recipe->Ratings==3)
                            <ul class="d-flex" style="list-style:none; ">
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-regular fa-star"></i></li>
                                <li><i class="fa-regular fa-star"></i></li>
                            </ul>
                            @endif
                            @if ($recipe->Ratings==4)
                            <ul class="d-flex" style="list-style:none; ">
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-regular fa-star"></i></li>
                            </ul>
                            @endif
                            @if ($recipe->Ratings==5)
                            <ul class="d-flex" style="list-style:none; ">
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                            </ul>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td scope="row" style="width: 250px">Author Name</td>
                        <td>{{$recipe->user->name}}</td>
                    </tr>
                    <tr>
                        <td scope="row" style="width: 250px">
                            <div class="box">
                                <a class="button" href="#popup1">Rate this recipe</a>
                            </div>

                            <div id="popup1" class="overlay">
                                <div class="popup">
                                    <h2>Write a feedback</h2>
                                    <a class="close" href="#">&times;</a>
                                    <div class="content">
                                        <form method="POST" action="{{url('add_rating')}}" name="ratingform" id="ratingform">@csrf
                                            <input type="hidden" name="recipe_id" value="{{$recipe->id}}">
                                            <div class="rate">
                                                <input type="radio" id="star5" name="rating" value="5" />
                                                <label for="star5" title="text">5 stars</label>
                                                <input type="radio" id="star4" name="rating" value="4" />
                                                <label for="star4" title="text">4 stars</label>
                                                <input type="radio" id="star3" name="rating" value="3" />
                                                <label for="star3" title="text">3 stars</label>
                                                <input type="radio" id="star2" name="rating" value="2" />
                                                <label for="star2" title="text">2 stars</label>
                                                <input type="radio" id="star1" name="rating" value="1" />
                                                <label for="star1" title="text">1 star</label>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea2" class="form-label"></label>
                                                <textarea class="form-control" name="feedback" id="exampleFormControlTextarea2" rows="3" style="width:400px; height:90px;" required=""></textarea>
                                            </div>
                                            <div>&nbsp;</div>
                                            <div class="form-group">
                                                <input class='btn btn-primary' type="submit" name="Submit">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                                        </td>
                                        <td></td><td>
                            <div class="span4">
                            <h3>Users Reviews</h3>
                            @foreach($rating as $key => $item)
                                    <div>
                                    <p>{{$item->user->name}}</p>
                                    <?php
                                     $count=1;
                                     while($count<=5){ 
                                        if($count<=$item->rating){ ?>
                                            <span>&#11088;</span>
                                    <?php } 
                                        else{?>    
                                        <span>&#10032;</span>
                                        <?php } ?>
                                     <?php $count++;} ?>
                                     <small>Reviewed on {{date("d M Y H:i:s",strtotime($item->created_at));}}</small>
                                        <p>{{$item->review}}</p>
                                        
                                    </div>
                            @endforeach
                            
                        </div>
                        </td>
                    </tr>
                    <tr>
                    <td scope="row" style="width: 250px">>
                        <div class="row"> 
                            
                        <div class="span4">
                            <h3>Write a Review</h3>
                            <form method="POST" action="{{url('add_rating')}}" name="ratingform" id="ratingform">@csrf
                                <input type="hidden" name="recipe_id" value="{{$recipe->id}}">
                                <div class="rate">
                                    <input type="radio" id="star5" name="rating" value="5" />
                                    <label for="star5" title="text">5 stars</label>
                                    <input type="radio" id="star4" name="rating" value="4" />
                                    <label for="star4" title="text">4 stars</label>
                                    <input type="radio" id="star3" name="rating" value="3" />
                                    <label for="star3" title="text">3 stars</label>
                                    <input type="radio" id="star2" name="rating" value="2" />
                                    <label for="star2" title="text">2 stars</label>
                                    <input type="radio" id="star1" name="rating" value="1" />
                                    <label for="star1" title="text">1 star</label>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea2" class="form-label">Your Feedback</label>
                                    <textarea class="form-control" name="feedback" id="exampleFormControlTextarea2" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <input class='btn btn-primary' type="submit" name="Submit">
                                </div>
                            </form>
                        </div>
                        <div>&nbsp;</div>
                        <div class="span4">
                            <h3>Users Reviews</h3>
                            @foreach($rating as $key => $item)
                                    <div>
                                    <?php
                                     $count=1;
                                     while($count<=5){ 
                                        if($count<=$item->rating){ ?>
                                            <span>&#9733;</span>
                                    <?php } 
                                        else{?>    
                                        <span>&#9734;</span>
                                        <?php } ?>
                                     <?php $count++;} ?>
                                        <p>{{$item->review}}</p>
                                        <p>{{$item->user->name}}</p>
                                        <p>{{date("d M Y H:i:s",strtotime($item->created_at));}}</p>
                                    </div>
                            @endforeach
                            
                        </div>
                    </td>
                    </tr>
                    @if(Auth::check())
    @if(Auth::user()->favoriteRecipes->contains($recipe->id))
        <form action="{{ route('recipes.removeFromFavorites', ['recipe' => $recipe->id]) }}" method="POST">
            @csrf
            <button type="submit">Remove from Favorites</button>
        </form>
    @else 
        <form action="{{ route('recipes.addToFavorites', ['recipe' => $recipe->id]) }}" method="POST">
            @csrf
            <button type="submit">Add to Favorites</button>
        </form>
    @endif
@endif
                </tbody>
            </table>
            
        </div>
    </div>
</div>
<div class="tab-pane fade">
                <div class="row"> 
                    <div class="span4">
                        <h3>Write a Review</h3>
                    </div>
                    <div class="span4">
                        <h3>Users Reviews</h3>
                    </div>
                </div>
</div>


@include('frontend.layout.footer')
