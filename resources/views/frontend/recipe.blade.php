@include('frontend.layout.header')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>
<body>
        <section class="recipeview pt-4">

            <div class="container1">
                <div class="row gy-4">
                    @foreach ($recipe as $key => $item)
                    <div class="col-md-3">
                        <div class="innerimage">
                                <div class="imagetop">
                                <img src="{{asset('storage/recipe')}}/{{$item->image}}" alt="photos">
                                </div>
                                <div class="card-body">
                                <h5 class="card-title">{{$item->recipe_name}} </h5>

                                <div class="card-title" id='source'>{{$item->nutrition}}</div>

                                <div class='card-text'>
                                    <input type="checkbox" id="heart" checked/>
                                    <label for="heart">Favourite</label>
                                    
                                    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop{{$key+1}}" aria-controls="staticBackdrop">Link</button>
                                      
                                      <div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop{{$key+1}}" aria-labelledby="staticBackdropLabel">
                                        <div class="offcanvas-header">
                                          <h5 class="offcanvas-title" id="staticBackdropLabel">Recipe Description</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                        </div>
                                        <div class="offcanvas-body">
                                            <img src="{{asset('storage/recipe')}}/{{$item->image}}" alt="photos">
                                          <div class='off-card'>
                                                  <div class='offcanvas-box'>
                                                    <p> Recipe Name: </p>
                                                      <h5 class="offcard-title">{{$item->recipe_name}}</h5>
                                                      <?php   
                                                        $count=0;
                                                        $person=0; ?>
                                                      @foreach ($rating as $ki=>$rate)
                                                       <?php
                                                        $r= $rate['recipe_id']; 
                                                        ?>
                                                        <?php if ($r==$item['id']){ 
                                                            $person=$person+1;
                                                            $count=$count+$rate['rating'];
                                                        }?>
                                                        
                                                    @endforeach
                                                    <?php 
                                                    $avg=0;
                                                    if ($person>0)
                                                        $avg=$count/$person;
                                                    $star=1;
                                                    while($star<=5){ 
                                                        if($star<=$avg){ ?>
                                                            <span>&#11088;</span>
                                                    <?php } 
                                                        else{?>    
                                                        <span>&#10032;</span>
                                                        <?php } ?>
                                                    <?php $star++;} ?>
                                                    ({{$person}}) 
                                                                                               
                                                  </div>
                                                  <div class='offcanvas-box'>
                                                    <p> Recipe Category: </p>
                                                      <h5 class="offcard-title">{{$item->id}}</h5>                                           
                                                  </div>
                                                  <div class='offcanvas-box'>
                                                    <p> Recipe Category: </p>
                                                      <h5 class="offcard-title">{{$item->category}}</h5>                                           
                                                  </div>
                                                  <div class='offcanvas-box'>
                                                    <p> Recipe Description: </p>
                                                      <h5 class="offcard-title">{{$item->recipe_description}}</h5>                                           
                                                  </div>
                                                  <div class='offcanvas-box'>
                                                    <p> Key Ingredients: </p>
                                                      <h5 class="offcard-title">{{$item->ing}}</h5>                                           
                                                  </div>
                                                  <div class='offcanvas-box'>
                                                    <p> Cooking Time: </p>
                                                      <h5 class="offcard-title">{{$item->cookingtime}}</h5>                                           
                                                  </div>
                                                  <div class='offcanvas-box'>
                                                    <p> Nutritional Values: </p>
                                                      <h5 class="offcard-title">{{$item->nutrition}}</h5>                                           
                                                  </div>
                                                  <div class='offcanvas-box'> 
                                                    <div class="span4">
                                                        <p>Write a Review</p>
                                                        <form method="POST" action="{{url('add_rating')}}" name="ratingform" id="ratingform">@csrf
                                                            <input type="hidden" name="recipe_id" value="{{$item->id}}">
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
                                                                
                                                                <textarea class="form-control" name="feedback" id="exampleFormControlTextarea2" rows="3"></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <input class='btn btn-primary' type="submit" name="Submit">
                                                            </div>
                                                        </form>
                                                    </div>
                                                  </div>
                                                  <div class='offcanvas-box'>
                                                  <p>Users Reviews</p>
                                                  @foreach ($rating as $ki=>$rate)
                                                        <?php  $r= $rate['recipe_id'] ?>
                                                        <?php if ($r==$item['id']){ ?>
                                                        <h5 class="offcard-title">
                                                        <p>{{$rate->user->name}} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <small style="text-align:right" >  Reviewed on {{date("d M Y H:i:s",strtotime($rate->created_at));}}</small></p>
                                                        <?php
                                                        $count=1;
                                                        while($count<=5){ 
                                                            if($count<=$rate->rating){ ?>
                                                                <span>&#11088;</span>
                                                        <?php } 
                                                            else{?>    
                                                            <span>&#10032;</span>
                                                            <?php } ?>
                                                        <?php $count++;} ?>
                                                        
                                                            <p>{{$rate->review}}</p>
                                                            
                                                        
                                                        <?php }  ?>
                                                  @endforeach
                                                  
                                                </div>
                                                  <div class='offcanvas-box'>
                                                    <p> Video Tutorial: </p>
                                                      <h5 class="offcard-title">{{$item->video}}</h5> 
                                                      <iframe width="100%" height="315" src="{{$item->video}}"
                                                        title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> 
                                    
                                                  </div>

                                          </div>
                                        </div>
                                      </div>

                                </div>
  
                            </div>
                            <div class="card-footer">
                                <small class="text-body-secondary">{{$item->category}}</small>
                                
                            </div>
                            </div>
                        </div>
                       
                    @endforeach
                </div>
            </div>
            
            <div class="container2">
                <div>


                    <form action='{{URL::current()}}' method="GET">
                    <div class='ingclass'>
                        <div class='ingbox'>
                            <p class="d-inline-flex gap-1">
                                <button type="submit" class="btn btn-success">Submit</button>

                                <b>Ingredients Collection:</b>

                              </p>
                        </div>
                        <div class='ingbox'>
                            <p class="d-inline-flex gap-1">
                                <img src="{{asset('storage\icon\pantry essestial.png')}}" alt="photos"  width="50" height="50">
                                <a style="text-decoration:none" class="innerbutton" data-bs-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample">
                                  Pantry Essestials
                                </a>
                              </p>
                              <div class="collapse" id="collapseExample1">
                                <div class="card card-body" id=collapsecardbody>
                                    <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                        <input type="checkbox" class="btn-check" id="btncheck1" name="filter[]" value="Rice" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="btncheck1">Rice</label>
                                      
                                        <input type="checkbox" class="btn-check" id="btncheck2" name="filter[]" value="Onion" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="btncheck2">Onion</label>
                                      
                                        <input type="checkbox" class="btn-check" id="btncheck3" name="filter[]" value="Milk" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="btncheck3">Milk</label>                              

                                      </div>
                                      <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                        <input type="checkbox" class="btn-check" id="btncheck4" name="filter[]" value="Egg" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="btncheck4">Egg</label>
                                      
                                        <input type="checkbox" class="btn-check" id="btncheck5" name="filter[]" value="Garlic" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="btncheck5">Garlic</label>
                                      
                                        <input type="checkbox" class="btn-check" id="btncheck6" name="filter[]" value="Egg" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="btncheck6">Oil</label>
                                      </div>
                                      <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                        <input type="checkbox" class="btn-check" id="btncheck7" name="filter[]" value="Salt" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="btncheck7">Salt</label>
                                      
                                        <input type="checkbox" class="btn-check" id="btncheck8" name="filter[]" value="Vinegar" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="btncheck8">Vinegar</label>
                                      
                                        <input type="checkbox" class="btn-check" id="btncheck9" name="filter[]" value="Sugar" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="btncheck9">Sugar</label>
                                      </div>
                                      </div>
                                      </div>
                                      </div>

                        <div class='ingbox'>
                            <p class="d-inline-flex gap-1">
                                <img src="{{asset('storage\icon\baking.png')}}" alt="photos"  width="50" height="50">
                                <a style="text-decoration:none" class="innerbutton" data-bs-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample">
                                  Baking
                                </a>
                              </p>
                              <div class="collapse" id="collapseExample2">
                                <div class="card card-body" id=collapsecardbody>
                                    <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                        <input type="checkbox" class="btn-check" id="btncheck10" name="filter[]" value="Flour" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="btncheck10">Flour</label>
                                      
                                        <input type="checkbox" class="btn-check" id="btncheck11" name="filter[]" value="Bread" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="btncheck11">Bread</label>
                                      
                                        <input type="checkbox" class="btn-check" id="btncheck12" name="filter[]" value="Yeast" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="btncheck12">Yeast</label>
                                      </div>
                                      <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                        <input type="checkbox" class="btn-check" id="btncheck13" name="filter[]" value="Paratha" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="btncheck13">Paratha</label>
                                      
                                        <input type="checkbox" class="btn-check" id="btncheck14" name="filter[]" value="Vanilla" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="btncheck14">Vanilla</label>
                                      
                                        <input type="checkbox" class="btn-check" id="btncheck15" name="filter[]" value="Baking Powder" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="btncheck15">Baking Powder</label>
                                      </div>
                                      <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                        <input type="checkbox" class="btn-check" id="btncheck16" name="filter[]" value="Wheat" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="btncheck16">Wheat</label>
                                      
                                        <input type="checkbox" class="btn-check" id="btncheck17" name="filter[]" value="Corn Flour" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="btncheck17">Corn Flour</label>
                                      
                                        <input type="checkbox" class="btn-check" id="btncheck18" name="filter[]" value="Cake Mix" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="btncheck18">Cake Mix</label>
                                      </div>
                                      </div>
                                      </div>
                                      </div>

                        <div class='ingbox'>
                            <p class="d-inline-flex gap-1">
                                <img src="{{asset('storage\icon\meats.png')}}" alt="photos"  width="50" height="50">
                                <a style="text-decoration:none" class="innerbutton" data-bs-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample">
                                  Meats & Seafood
                                </a>
                              </p>
                              <div class="collapse" id="collapseExample3">
                                <div class="card card-body" id=collapsecardbody>
                                    <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                        <input type="checkbox" class="btn-check" id="btncheck19" name="filter[]" value="Chicken" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="btncheck19">Chicken</label>
                                      
                                        <input type="checkbox" class="btn-check" id="btncheck20" name="filter[]" value="Beef" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="btncheck20">Beef</label>
                                      
                                        <input type="checkbox" class="btn-check" id="btncheck21" name="filter[]" value="Mutton" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="btncheck21">Mutton</label>
                                      </div>
                                      <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                        <input type="checkbox" class="btn-check" id="btncheck22" name="filter[]" value="Salmon" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="btncheck22">Salmon</label>
                                      
                                        <input type="checkbox" class="btn-check" id="btncheck23" name="filter[]" value="Tuna" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="btncheck23">Tuna</label>
                                      
                                        <input type="checkbox" class="btn-check" id="btncheck24" name="filter[]" value="Tilapia" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="btncheck24">Tilapia</label>
                                      </div>
                                      <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                        <input type="checkbox" class="btn-check" id="btncheck25" name="filter[]" value="Prawn" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="btncheck25">Prawn</label>
                                      
                                        <input type="checkbox" class="btn-check" id="btncheck26" name="filter[]" value="Crab" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="btncheck26">Crab</label>
                                      
                                        <input type="checkbox" class="btn-check" id="btncheck27" name="filter[]" value="Snapper" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="btncheck27">Snapper</label>
                                      </div>
                                      </div>
                                      </div>
                                      </div>

                                      <div class='ingbox'>
                                        <p class="d-inline-flex gap-1">
                                            <img src="{{asset('storage\icon\fruits.png')}}" alt="photos"  width="50" height="50">
                                            <a style="text-decoration:none" class="innerbutton" data-bs-toggle="collapse" href="#collapseExample4" role="button" aria-expanded="false" aria-controls="collapseExample">
                                              Fruits
                                            </a>
                                          </p>
                                          <div class="collapse" id="collapseExample4">
                                            <div class="card card-body" id=collapsecardbody>
                                                <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                                    <input type="checkbox" class="btn-check" id="btncheck28" name="filter[]" value="Apple" autocomplete="off">
                                                    <label class="btn btn-outline-primary" for="btncheck28">Apple</label>
                                                  
                                                    <input type="checkbox" class="btn-check" id="btncheck29" name="filter[]" value="Orange" autocomplete="off">
                                                    <label class="btn btn-outline-primary" for="btncheck29">Orange</label>
                                                  
                                                    <input type="checkbox" class="btn-check" id="btncheck30" name="filter[]" value="Banana" autocomplete="off">
                                                    <label class="btn btn-outline-primary" for="btncheck30">Banana</label>
                                                  </div>
                                                  <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                                    <input type="checkbox" class="btn-check" id="btncheck31" name="filter[]" value="Mango" autocomplete="off">
                                                    <label class="btn btn-outline-primary" for="btncheck31">Mango</label>
                                                  
                                                    <input type="checkbox" class="btn-check" id="btncheck32" name="filter[]" value="Pineapple" autocomplete="off">
                                                    <label class="btn btn-outline-primary" for="btncheck32">Pineapple</label>
                                                  
                                                    <input type="checkbox" class="btn-check" id="btncheck33" name="filter[]" value="Grape" autocomplete="off">
                                                    <label class="btn btn-outline-primary" for="btncheck33">Grape</label>
                                                  </div>
                                                  <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                                    <input type="checkbox" class="btn-check" id="btncheck34" name="filter[]" value="Coconut" autocomplete="off">
                                                    <label class="btn btn-outline-primary" for="btncheck34">Coconut</label>
                                                  
                                                    <input type="checkbox" class="btn-check" id="btncheck35" name="filter[]" value="Date" autocomplete="off">
                                                    <label class="btn btn-outline-primary" for="btncheck35">Date</label>
                                                  
                                                    <input type="checkbox" class="btn-check" id="btncheck36" name="filter[]" value="Lime" autocomplete="off">
                                                    <label class="btn btn-outline-primary" for="btncheck36">Lime</label>
                                                  </div>
                                                  </div>
                                                  </div>
                                                  </div>
                                                  <div class='ingbox'>
                                                    <p class="d-inline-flex gap-1">
                                                        <img src="{{asset('storage\icon\spices.png')}}" alt="photos"  width="50" height="50">
                                                        <a style="text-decoration:none" class="innerbutton" data-bs-toggle="collapse" href="#collapseExample5" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                          Herbs & Spices
                                                        </a>
                                                      </p>
                                                      <div class="collapse" id="collapseExample5">
                                                        <div class="card card-body" id=collapsecardbody>
                                                            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                                                <input type="checkbox" class="btn-check" id="btncheck37" name="filter[]" value="Chillies" autocomplete="off">
                                                                <label class="btn btn-outline-primary" for="btncheck37">Chillies</label>
                                                              
                                                                <input type="checkbox" class="btn-check" id="btncheck38" name="filter[]" value="Oregano" autocomplete="off">
                                                                <label class="btn btn-outline-primary" for="btncheck38">Oregano</label>
                                                              
                                                                <input type="checkbox" class="btn-check" id="btncheck39" name="filter[]" value="Cumin" autocomplete="off">
                                                                <label class="btn btn-outline-primary" for="btncheck39">Cumin</label>
                                                              </div>
                                                              <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                                                <input type="checkbox" class="btn-check" id="btncheck40" name="filter[]" value="Parsley" autocomplete="off">
                                                                <label class="btn btn-outline-primary" for="btncheck40">parsley</label>
                                                              
                                                                <input type="checkbox" class="btn-check" id="btncheck41" name="filter[]" value="Ginger" autocomplete="off">
                                                                <label class="btn btn-outline-primary" for="btncheck41">Ginger</label>
                                                              
                                                                <input type="checkbox" class="btn-check" id="btncheck42" name="filter[]" value="Paprika" autocomplete="off">
                                                                <label class="btn btn-outline-primary" for="btncheck42">Paprika</label>
                                                              </div>
                                                              </div>
                                                              </div>
                                                              </div>

                                      <div class='ingbox'>
                                        <p class="d-inline-flex gap-1">
                                            <img src="{{asset('storage\icon\vegetables.png')}}" alt="photos"  width="50" height="50">
                                            <a style="text-decoration:none" class="innerbutton" data-bs-toggle="collapse" href="#collapseExample6" role="button" aria-expanded="false" aria-controls="collapseExample">
                                              Vegetables
                                            </a>
                                          </p>
                                          <div class="collapse" id="collapseExample6">
                                            <div class="card card-body" id=collapsecardbody>
                                                <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                                    <input type="checkbox" class="btn-check" id="btncheck46" name="filter[]" value="Carrot" autocomplete="off">
                                                    <label class="btn btn-outline-primary" for="btncheck46">Carrot</label>
                                                  
                                                    <input type="checkbox" class="btn-check" id="btncheck47" name="filter[]" value="Tomato" autocomplete="off">
                                                    <label class="btn btn-outline-primary" for="btncheck47">Tomato</label>
                                                  
                                                    <input type="checkbox" class="btn-check" id="btncheck48" name="filter[]" value="Potato" autocomplete="off">
                                                    <label class="btn btn-outline-primary" for="btncheck48">Potato</label>
                                                  </div>
                                                  <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                                    <input type="checkbox" class="btn-check" id="btncheck49" name="filter[]" value="Corn" autocomplete="off">
                                                    <label class="btn btn-outline-primary" for="btncheck49">Corn</label>
                                                  
                                                    <input type="checkbox" class="btn-check" id="btncheck50" name="filter[]" value="Cucumber" autocomplete="off">
                                                    <label class="btn btn-outline-primary" for="btncheck50">Cucumber</label>
                                                  
                                                    <input type="checkbox" class="btn-check" id="btncheck51" name="filter[]" value="Mushroom" autocomplete="off">
                                                    <label class="btn btn-outline-primary" for="btncheck51">Mushroom</label>
                                                  </div>
                                                  <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                                    <input type="checkbox" class="btn-check" id="btncheck52" name="filter[]" value="Bell Pepper" autocomplete="off">
                                                    <label class="btn btn-outline-primary" for="btncheck52">Bell Pepper</label>
                                                  
                                                    <input type="checkbox" class="btn-check" id="btncheck53" name="filter[]" value="Lettuce" autocomplete="off">
                                                    <label class="btn btn-outline-primary" for="btncheck53">Lettuce</label>
                                                  
                                                    <input type="checkbox" class="btn-check" id="btncheck54" name="filter[]" value="Lemon" autocomplete="off">
                                                    <label class="btn btn-outline-primary" for="btncheck54">Lemon</label>
                                                  </div>
                                                  </div>
                                                  </div>
                                                  </div>
                                                  <div class='ingbox'>
                                                    <p class="d-inline-flex gap-1">
                                                        <img src="{{asset('storage\icon\dairy.png')}}" alt="photos"  width="50" height="50">
                                                        <a style="text-decoration:none" class="innerbutton" data-bs-toggle="collapse" href="#collapseExample7" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                          Dairy
                                                        </a>
                                                      </p>
                                                      <div class="collapse" id="collapseExample7">
                                                        <div class="card card-body" id=collapsecardbody>
                                                            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                                                <input type="checkbox" class="btn-check" id="btncheck55" name="filter[]" value="Cheese" autocomplete="off">
                                                                <label class="btn btn-outline-primary" for="btncheck55">Cheese</label>
                                                              
                                                                <input type="checkbox" class="btn-check" id="btncheck56" name="filter[]" value="Yogurt" autocomplete="off">
                                                                <label class="btn btn-outline-primary" for="btncheck56">Yogurt</label>
                                                              
                                                                <input type="checkbox" class="btn-check" id="btncheck57" name="filter[]" value="Ghee" autocomplete="off">
                                                                <label class="btn btn-outline-primary" for="btncheck57">Ghee</label>
                                                              </div>
                                                              <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                                                <input type="checkbox" class="btn-check" id="btncheck58" name="filter[]" value="Cream" autocomplete="off">
                                                                <label class="btn btn-outline-primary" for="btncheck58">Cream</label>
                                                              
                                                                <input type="checkbox" class="btn-check" id="btncheck59" name="filter[]" value="Condensed Milk" autocomplete="off">
                                                                <label class="btn btn-outline-primary" for="btncheck59">Condensed Milk</label>
                                                              
                                                                <input type="checkbox" class="btn-check" id="btncheck60" name="filter[]" value="Ice Cream" autocomplete="off">
                                                                <label class="btn btn-outline-primary" for="btncheck60">Ice Cream</label>
                                                              </div>
                                                              <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                                                <input type="checkbox" class="btn-check" id="btncheck61" name="filter[]" value="Curd" autocomplete="off">
                                                                <label class="btn btn-outline-primary" for="btncheck61">Curd</label>
                                                              
                                                                <input type="checkbox" class="btn-check" id="btncheck62" name="filter[]" value="Mayonaise" autocomplete="off">
                                                                <label class="btn btn-outline-primary" for="btncheck62">Mayonaise</label>
                                                              
                                                                <input type="checkbox" class="btn-check" id="btncheck63" name="filter[]" value="Butter" autocomplete="off">
                                                                <label class="btn btn-outline-primary" for="btncheck63">Butter</label>
                                                              </div>
                                                              </div>
                                                              </div>
                                                              </div>
                                                              <div class='ingbox'>
                                                                <p class="d-inline-flex gap-1">
                                                                    <img src="{{asset('storage\icon\sweets.png')}}" alt="photos"  width="50" height="50">
                                                                    <a style="text-decoration:none" class="innerbutton" data-bs-toggle="collapse" href="#collapseExample8" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                                      Sweets
                                                                    </a>
                                                                  </p>
                                                        <div class="collapse" id="collapseExample8">
                                                            <div class="card card-body" id=collapsecardbody>
                                                            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                                                <input type="checkbox" class="btn-check" id="btncheck64" name="filter[]" value="Chocolate" autocomplete="off">
                                                                <label class="btn btn-outline-primary" for="btncheck64">Chocolate</label>
                                                                          
                                                                <input type="checkbox" class="btn-check" id="btncheck65" name="filter[]" value="Syrup" autocomplete="off">
                                                                <label class="btn btn-outline-primary" for="btncheck65">Syrup</label>
                                                                          
                                                                <input type="checkbox" class="btn-check" id="btncheck66" name="filter[]" value="Honey" autocomplete="off">
                                                                <label class="btn btn-outline-primary" for="btncheck66">Honey</label>
                                                                </div>
                                                                <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                                                <input type="checkbox" class="btn-check" id="btncheck67" name="filter[]" value="Fudge" autocomplete="off">
                                                                <label class="btn btn-outline-primary" for="btncheck67">Fudge</label>
                                                                          
                                                                <input type="checkbox" class="btn-check" id="btncheck68" name="filter[]" value="Strawberry Jam" autocomplete="off">
                                                                <label class="btn btn-outline-primary" for="btncheck68">Strawberry jam</label>
                                                                          
                                                                <input type="checkbox" class="btn-check" id="btncheck69" name="filter[]" value="Caramel" autocomplete="off">
                                                                <label class="btn btn-outline-primary" for="btncheck69">Caramel</label>
                                                                </div>
                                                                </div>
                                                                </div>
                                                                </div>
                                                                <div class='ingbox'>
                                                                  <p class="d-inline-flex gap-1">
                                                                      <img src="{{asset('storage\icon\oils.png')}}" alt="photos"  width="50" height="50">
                                                                      <a style="text-decoration:none" class="innerbutton" data-bs-toggle="collapse" href="#collapseExample9" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                                        Nuts,Seeds & Condiments
                                                                      </a>
                                                                    </p>
                                                          <div class="collapse" id="collapseExample9">
                                                              <div class="card card-body" id=collapsecardbody>
                                                                <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                                                  <input type="checkbox" class="btn-check" id="btncheck70" name="filter[]" value="Chia Seed" autocomplete="off">
                                                                  <label class="btn btn-outline-primary" for="btncheck70">Chia Seed</label>
                                                                            
                                                                  <input type="checkbox" class="btn-check" id="btncheck71" name="filter[]" value="Cashew" autocomplete="off">
                                                                  <label class="btn btn-outline-primary" for="btncheck71">Cashew</label>
                                                                            
                                                                  <input type="checkbox" class="btn-check" id="btncheck72" name="filter[]" value="Peas" autocomplete="off">
                                                                  <label class="btn btn-outline-primary" for="btncheck72">Peas</label>
                                                                  </div>

                                                                  <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                                                    <input type="checkbox" class="btn-check" id="btncheck43" name="filter[]" value="Lentils" autocomplete="off">
                                                                    <label class="btn btn-outline-primary" for="btncheck43">Lentils</label>
                                                                  
                                                                    <input type="checkbox" class="btn-check" id="btncheck44" name="filter[]" value="Basmati Rice" autocomplete="off">
                                                                    <label class="btn btn-outline-primary" for="btncheck44">Basmati Rice</label>
                                                                  
                                                                    <input type="checkbox" class="btn-check" id="btncheck45" name="filter[]" value="Peanut" autocomplete="off">
                                                                    <label class="btn btn-outline-primary" for="btncheck45">Peanut</label>
                                                                  </div>

                                                                  <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                                                  <input type="checkbox" class="btn-check" id="btncheck73" name="filter[]" value="Ketchup" autocomplete="off">
                                                                  <label class="btn btn-outline-primary" for="btncheck73">Ketchup</label>
                                                                            
                                                                  <input type="checkbox" class="btn-check" id="btncheck74" name="filter[]" value="Pasta" autocomplete="off">
                                                                  <label class="btn btn-outline-primary" for="btncheck74">Pasta</label>
                                                                            
                                                                  <input type="checkbox" class="btn-check" id="btncheck75" name="filter[]" value="Soy Sauce" autocomplete="off">
                                                                  <label class="btn btn-outline-primary" for="btncheck75">Soy Sauce</label>
                                                                  </div>
                                                                  </div>
                                                                  </div>
                                                                  </div>








                    </div>
                </form>
                </div>
                        
                    </div>

                    </div>
                </div>
                </div>
                
               
        </section>
        





      
        
    </body>
</html>
@include('frontend.layout.footer')