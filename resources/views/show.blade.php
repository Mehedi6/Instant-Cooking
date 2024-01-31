<!-- resources/views/meals/show.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{asset('assets/api.css')}}">
    <link rel = "stylesheet" href = "assets/api.css">
    <title>Recipe Details</title>
</head>
<body>
<div class = "container">
    <div class = "meal-wrapper">
        
    <h1>{{ $mealDetail['strMeal'] }} ( {{ $mealDetail['strArea'] }} )</h1>
            <div class = "recipe-meal-img">
                <img src="{{ $mealDetail['strMealThumb'] }}" alt="{{ $mealDetail['strMeal'] }}">
            </div>
            <h2>Ingredients</h2>
            
                @foreach ($mealIngredients as $ingredient)
                    {{ $ingredient }} ,
                @endforeach
            
            <div class = "recipe-instruct">
                <h2>Instructions</h2>
                <p>{{ $mealDetail['strInstructions'] }}</p>
            </div>
            <div class = "youtube-link">
                <a href="{{ $mealDetail['strYoutube'] }}" target = "_blank">Watch the Video</a> 
            </div>
</div>
</div>
        
</body>
</html>