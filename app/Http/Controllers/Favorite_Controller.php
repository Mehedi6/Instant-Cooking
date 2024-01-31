<?php

namespace App\Http\Controllers;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Recipes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Favorite_Controller extends Controller
{
    //
    public function addToFavorites(Request $request,  $recipe)
    {
        echo "Hello world";
        $recipeObject = Recipes::findOrFail($recipe); 
        $user = Auth::user();
        $user->favoriteRecipes()->attach($recipeObject->id);

        return redirect()->back()->with('success', 'Recipe added to favorites!');
    }
    public function removeFromFavorites(Request $request,  $recipe)
    {
        $user = Auth::user();
        $recipeObject = Recipes::findOrFail($recipe);
        $user->favoriteRecipes()->detach($recipeObject->id);

        return redirect()->back()->with('success', 'Recipe removed from favorites.');
    }
    
    public function showFavorites()
    {
        $user = auth()->user();
        $now = $user->id;
       
        $favshow= DB::table('user_favorites')
        ->join('recipes','user_favorites.recipe_id',"=",'recipes.id')->where('user_favorites.user_id',"$now")
        ->select('recipes.RecipeName','recipes.RecipeDescription','Image','recipes.id','recipes.RecipeIngredients')
        ->get();
        return view('favorites',['favs'=>$favshow]);
        
    }   
   

}
