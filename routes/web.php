<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\RatingsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ApiSearchController;
use App\Http\Controllers\Favorite_Controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('home.index');
}); */

//emnei


//



Route::get('/redirects',[HomeController::class,"check"]);
//API
Route::get('/request', [ApiSearchController::class, 'fetchRecipes'])->name('request');
Route::get('/details/{mealId}', [ApiSearchController::class, 'show'])->name('show');
Route::get('/explore_recipes', [ApiSearchController::class, 'search'])->name('explore');
Route::get('/show_recipes', [ApiSearchController::class, 'search'])->name('back.to');
Route::get('/show_recipes', [FrontEndController::class, 'recipe'])->name('back');
Route::get('/home',[FrontEndController::class, 'index'])->name('index');
Route::get('/welcome',[FrontEndController::class, 'welcome'])->name('welcome');


Route::get('/',[FrontEndController::class, 'welcome']);//ekdom first page website khullei je ashe oita show koracche. 
Route::get('/showdiet', [FrontEndController::class, 'diet'])->name('showdiet');
// a route for the URL path /showdiet, and when a user visits that URL, Laravel will execute the diet method in the FrontEndController. Additionally, this route is named showdiet,
Route::get('/showrecipe', [FrontEndController::class, 'recipe'])->name('showrecipe');
Route::get('/categorypost/{category_id}',[FrontEndController::class,'categorypost'])->name('categorypost');

//Route::get('/single/{slug}', [FrontEndController::class, 'show'])->name('singlepage');

Route::get('user/single/{id}', [FrontEndController::class, 'postshowuser'])->name('showsinglepageuser');
Route::post('/recipes/{recipe}/add-to-favorites', [Favorite_Controller::class, 'addToFavorites'])->name('recipes.addToFavorites');
Route::post('/recipes/{recipe}/remove-from-favorites', [Favorite_Controller::class, 'removeFromFavorites'])->name('recipes.removeFromFavorites'); 
Route::get('/favoritess',  [Favorite_Controller::class, 'showFavorites'])->name('showFavorites');


Route::middleware([
    'auth:sanctum',//API token authentication. It ensures that the user is authenticated before accessing the route.
    config('jetstream.auth_session'),//ensure that the user's session is authenticated.
    'verified'//email address of the user has been verified
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('Category',CategoryController::class);
    //resource method is a convenient way to define routes for common CRUD operations 
    //Route::resource('tag',TagController::class);
    Route::resource('Posts',PostController::class);
    Route::Post('/Createpost',[PostController::class,'store'])->name('Posts.store');
   // Route::delete('/tag/{id}', 'TagController@destroy');


    Route::delete('/Category/{id}', 'CategoryController@destroy');
    
    Route::delete('/Posts/{id}', 'PostController@destroy')->name('Posts.destroy');
    Route::put('/UpdatePosts/{id}',[PostController::class,'Update'])->name('Posts.UpdatePosts');
    Route::get('/editPosts/{id}',[PostController::class,'edit']);
    Route::get('CategoryPost/{category_id}',[PostController::class,'categorypost'])->name('categorypost');
    Route::get('/showcategory',[PostController::class,'showcategory'])->name('showcategory');
    Route::get('admin/single/{id}', [PostController::class, 'postshowadmin'])->name('showsinglepageadmin');
   ////recipe
    Route::resource('Recipe',RecipeController::class);
    Route::Post('/Createrecipe',[RecipeController::class,'store'])->name('recipe.store');
    Route::get('/show/{id}',[RecipeController::class,'show'])->name('recipe.show');
    Route::get('/editrecipe/{id}',[RecipeController::class,'edit'])->name('recipe.edit');
    Route::post('/updaterecipe/{id}',[RecipeController::class,'update'])->name('recipe.updaterecipe');
    Route::delete('/recipe/{id}', [RecipeController::class,'destroy'])->name('recipe.destroy');
    Route::get('/recipesingle/{id}', [FrontEndController::class, 'recipesingle'])->name('recipesingle');
    Route::get('/add_rating', [RatingsController::class, 'addRating']);
    Route::match(['GET','POST'], '/add_rating',[RatingsController::class, 'addRating'])->name('ratingform');

    Route::get('dashboard/admin', function () {
        return view('index');
    })->name('admin');


    
});

Route::group(['prefix' => 'user', 'middleware' => 'auth:user'], function () {
    
});

