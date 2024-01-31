<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Find Meal For Your Ingredients</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
  <link rel = "stylesheet" href = "assets/api.css">
</head>
<body>
    <form method="GET" action="{{ route('back') }}">
        <button class="btn btn-warning" type="submit">Back</button>
    </form>
  <div class = "container">
    <div class = "meal-wrapper">
      <div class = "meal-search">
        <h2 class = "title">Find Meals For Your Ingredients</h2>
        <!-- <blockquote>Real food doesn't have ingredients, real food is ingredients.<br>
          <cite>- Jamie Oliver</cite> -->
        </blockquote>
        <form method="GET" action="{{ route('request') }}" style="width:100%">
            <div class = "meal-search-box">
                    <input type="text" class="search-control" name="query" placeholder="Search for a recipe">
                    <button type="submit" class="search-btn btn"><i class = "fas fa-search"></i></button>
                
            </div>
        </form>
      </div>
    <div class = "meal-result">
            <h1 class="text-center">{{Session::get('message')}}</h1>
            <div id= "meal">
            @foreach ($RandomDetails as $result)
                        
                        <div class="card">
                            <div class = "meal-img">
                            <a href="{{ route('show', $result['idMeal']) }}">
                                <img src="{{ $result['strMealThumb'] }}" alt="{{ $result['strMeal'] }}"> 
                            
                                <h3>{{ $result['strMeal'] }}</h3></a>
                                <!-- <h3><a href="{{ route('show', $result['idMeal']) }}">Get Recipe</a></h3>  -->
                            
                            </div>
                        
                        </div>
                        
                    @endforeach 
    

    </div>
</div>
    <!-- Display other details as needed -->
    <script src = "script.js"></script>
</body>
</html>