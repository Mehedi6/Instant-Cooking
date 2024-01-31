<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Posts;
use App\Models\Recipes;
use App\Models\Tag;
use App\Models\Home;
use App\Models\User;
use App\Models\Rating;

use Session;


class FrontEndController extends Controller
{

    public function go($id){
        return view('frontend.layout.header');
    }


    public function recipesingle($id){
        $recipe = Recipes::where('id',$id)->first();
        $rating = Rating::with('user')->where('recipe_id',$id)->orderBy('id','desc')->get();
        $ratingSum = Rating::where('recipe_id',$id)->sum('rating');
        $ratingCount=Rating::where('recipe_id',$id)->count();
        if($ratingCount>0){
            $avgRating=round($ratingSum/$ratingCount,2);
            $avgStarRating=round($ratingSum/$ratingCount,2);
        }
        else{
            $avgRating=0;
            $avgStarRating=0;
        }
        return view('frontend.recipesingle',compact('recipe','rating','avgRating','avgStarRating','ratingCount'));
    }

    Public function index(){
        return view('home');
    }
    Public function welcome(){
        return view('welcome');
    }

    public function diet(){
        $posts = Posts::all();//fetches all records from the Posts model
        $category = Categories::all();//fetches all records from the Category model
        // return view('admin.display.index',compact('posts','category'));
        return view('frontend.diet',compact('posts','category'));
        //it creates an array with two keys: 'posts' and 'category', 
        //and their values are the variables $posts and $category, respectively. 
        //This array is then passed to the view to make these variables available in 
        //the view's context.
    }
    
    public function recipe(Request $request){  
        
        // $search=$request['filter'] ?? "";
        // if ($search!=""){
        //     //where
        //     $recipe = Recipes::where('category','=','$search')->get();
        // }else{
        //     $recipe = Recipes::all();
        // }




        if($request->input('filter')){
            $checked=$_GET['filter'];
            $key=sizeof($checked);
            $recipe="";
            switch ($key){
                case 1: 
                    $recipe=Recipes::where('ing','LIKE',"%$checked[0]%")->get();
                    break;
                case 2: 
                    $recipe=Recipes::where('ing','LIKE',"%$checked[0]%")->orwhere('ing','LIKE',"%$checked[1]%")->get();
                    break;
                case 3: 
                    $recipe=Recipes::where('ing','LIKE',"%$checked[0]%")->orwhere('ing','LIKE',"%$checked[1]%")->orwhere('ing','LIKE',"%$checked[2]%")->get();
                    break;
                case 4: 
                    $recipe=Recipes::where('ing','LIKE','%$checked[0]%')->orwhere('ing','LIKE','%$checked[1]%')->orwhere('ing','LIKE','%$checked[2]%')->orwhere('ing','LIKE','%$checked[3]%')->get();

                    break;
                case 5: 
                    $recipe=Recipes::where('ing','LIKE','%$checked[0]%')->orwhere('ing','LIKE','%$checked[1]%')->orwhere('ing','LIKE','%$checked[2]%')->orwhere('ing','LIKE','%$checked[3]%')->orwhere('ing','LIKE','%$checked[4]%')->get();
                    break;
                case 6: 
                    $recipe=Recipes::where('ing','LIKE','%$checked[0]%')->orwhere('ing','LIKE','%$checked[1]%')->orwhere('ing','LIKE','%$checked[2]%')->orwhere('ing','LIKE','%$checked[3]%')->orwhere('ing','LIKE','%$checked[4]%')->orwhere('ing','LIKE','%$checked[5]%')->get();
                    break;
                case 7: 
                    $recipe=Recipes::where('ing','LIKE','%$checked[0]%')->orwhere('ing','LIKE','%$checked[1]%')->orwhere('ing','LIKE','%$checked[2]%')->orwhere('ing','LIKE','%$checked[3]%')->orwhere('ing','LIKE','%$checked[4]%')->orwhere('ing','LIKE','%$checked[5]%')->orwhere('ing','LIKE','%$checked[6]%')->get();
                    break;
                case 8: 
                    $recipe=Recipes::where('ing','LIKE','%$checked[0]%')->orwhere('ing','LIKE','%$checked[1]%')->orwhere('ing','LIKE','%$checked[2]%')->orwhere('ing','LIKE','%$checked[3]%')->orwhere('ing','LIKE','%$checked[4]%')->orwhere('ing','LIKE','%$checked[5]%')->orwhere('ing','LIKE','%$checked[6]%')->orwhere('ing','LIKE','%$checked[7]%')->get();

                    break;
                case 9: 
                    $recipe=Recipes::where('ing','LIKE','%$checked[0]%')->orwhere('ing','LIKE','%$checked[1]%')->orwhere('ing','LIKE','%$checked[2]%')->orwhere('ing','LIKE','%$checked[3]%')->orwhere('ing','LIKE','%$checked[4]%')->orwhere('ing','LIKE','%$checked[5]%')->orwhere('ing','LIKE','%$checked[6]%')->orwhere('ing','LIKE','%$checked[7]%')->orwhere('ing','LIKE','%$checked[8]%')->get();

                case 10: 
                    $recipe=Recipes::where('ing','LIKE','%$checked[0]%')->orwhere('ing','LIKE','%$checked[1]%')->orwhere('ing','LIKE','%$checked[2]%')->orwhere('ing','LIKE','%$checked[3]%')->orwhere('ing','LIKE','%$checked[4]%')->orwhere('ing','LIKE','%$checked[5]%')->orwhere('ing','LIKE','%$checked[6]%')->orwhere('ing','LIKE','%$checked[7]%')->orwhere('ing','LIKE','%$checked[8]%')->orwhere('ing','LIKE','%$checked[9]%')->get();

                    break;
                case 11: 
                    $recipe=Recipes::where('ing','LIKE','%$checked[0]%')->orwhere('ing','LIKE','%$checked[1]%')->orwhere('ing','LIKE','%$checked[2]%')->orwhere('ing','LIKE','%$checked[3]%')->orwhere('ing','LIKE','%$checked[4]%')->orwhere('ing','LIKE','%$checked[5]%')->orwhere('ing','LIKE','%$checked[6]%')->orwhere('ing','LIKE','%$checked[7]%')->orwhere('ing','LIKE','%$checked[8]%')->orwhere('ing','LIKE','%$checked[9]%')->orwhere('ing','LIKE','%$checked[10]%')->get();
                    break;
                case 12: 
                    $recipe=Recipes::where('ing','LIKE','%$checked[0]%')->orwhere('ing','LIKE','%$checked[1]%')->orwhere('ing','LIKE','%$checked[2]%')->orwhere('ing','LIKE','%$checked[3]%')->orwhere('ing','LIKE','%$checked[4]%')->orwhere('ing','LIKE','%$checked[5]%')->orwhere('ing','LIKE','%$checked[6]%')->orwhere('ing','LIKE','%$checked[7]%')->orwhere('ing','LIKE','%$checked[8]%')->orwhere('ing','LIKE','%$checked[9]%')->orwhere('ing','LIKE','%$checked[10]%')->orwhere('ing','LIKE','%$checked[11]%')->get();

                case 13: 
                    $recipe=Recipes::where('ing','LIKE','%$checked[0]%')->orwhere('ing','LIKE','%$checked[1]%')->orwhere('ing','LIKE','%$checked[2]%')->orwhere('ing','LIKE','%$checked[3]%')->orwhere('ing','LIKE','%$checked[4]%')->orwhere('ing','LIKE','%$checked[5]%')->orwhere('ing','LIKE','%$checked[6]%')->orwhere('ing','LIKE','%$checked[7]%')->orwhere('ing','LIKE','%$checked[8]%')->orwhere('ing','LIKE','%$checked[9]%')->orwhere('ing','LIKE','%$checked[10]%')->orwhere('ing','LIKE','%$checked[11]%')->orwhere('ing','LIKE','%$checked[12]%')->get();

                    break;
                case 14: 
                    $recipe=Recipes::where('ing','LIKE','%$checked[0]%')->orwhere('ing','LIKE','%$checked[1]%')->orwhere('ing','LIKE','%$checked[2]%')->orwhere('ing','LIKE','%$checked[3]%')->orwhere('ing','LIKE','%$checked[4]%')->orwhere('ing','LIKE','%$checked[5]%')->orwhere('ing','LIKE','%$checked[6]%')->orwhere('ing','LIKE','%$checked[7]%')->orwhere('ing','LIKE','%$checked[8]%')->orwhere('ing','LIKE','%$checked[9]%')->orwhere('ing','LIKE','%$checked[10]%')->orwhere('ing','LIKE','%$checked[11]%')->orwhere('ing','LIKE','%$checked[12]%')->orwhere('ing','LIKE','%$checked[13]%')->get();

                    break;
                case 15: 
                    $recipe=Recipes::where('ing','LIKE','%$checked[0]%')->orwhere('ing','LIKE','%$checked[1]%')->orwhere('ing','LIKE','%$checked[2]%')->orwhere('ing','LIKE','%$checked[3]%')->orwhere('ing','LIKE','%$checked[4]%')->orwhere('ing','LIKE','%$checked[5]%')->orwhere('ing','LIKE','%$checked[6]%')->orwhere('ing','LIKE','%$checked[7]%')->orwhere('ing','LIKE','%$checked[8]%')->orwhere('ing','LIKE','%$checked[9]%')->orwhere('ing','LIKE','%$checked[10]%')->orwhere('ing','LIKE','%$checked[11]%')->orwhere('ing','LIKE','%$checked[12]%')->orwhere('ing','LIKE','%$checked[13]%')->orwhere('ing','LIKE','%$checked[14]%')->get();

                case 16: 
                    $recipe=Recipes::where('ing','LIKE','%$checked[0]%')->orwhere('ing','LIKE','%$checked[1]%')->orwhere('ing','LIKE','%$checked[2]%')->orwhere('ing','LIKE','%$checked[3]%')->orwhere('ing','LIKE','%$checked[4]%')->orwhere('ing','LIKE','%$checked[5]%')->orwhere('ing','LIKE','%$checked[6]%')->orwhere('ing','LIKE','%$checked[7]%')->orwhere('ing','LIKE','%$checked[8]%')->orwhere('ing','LIKE','%$checked[9]%')->orwhere('ing','LIKE','%$checked[10]%')->orwhere('ing','LIKE','%$checked[11]%')->orwhere('ing','LIKE','%$checked[12]%')->orwhere('ing','LIKE','%$checked[13]%')->orwhere('ing','LIKE','%$checked[14]%')->orwhere('ing','LIKE','%$checked[15]%')->get();

                    break;
                case 17: 
                    $recipe=Recipes::where('ing','LIKE','%$checked[0]%')->orwhere('ing','LIKE','%$checked[1]%')->orwhere('ing','LIKE','%$checked[2]%')->orwhere('ing','LIKE','%$checked[3]%')->orwhere('ing','LIKE','%$checked[4]%')->orwhere('ing','LIKE','%$checked[5]%')->orwhere('ing','LIKE','%$checked[6]%')->orwhere('ing','LIKE','%$checked[7]%')->orwhere('ing','LIKE','%$checked[8]%')->orwhere('ing','LIKE','%$checked[9]%')->orwhere('ing','LIKE','%$checked[10]%')->orwhere('ing','LIKE','%$checked[11]%')->orwhere('ing','LIKE','%$checked[12]%')->orwhere('ing','LIKE','%$checked[13]%')->orwhere('ing','LIKE','%$checked[14]%')->orwhere('ing','LIKE','%$checked[15]%')->orwhere('ing','LIKE','%$checked[16]%')->get();

                    break;
                case 18: 
                    $recipe=Recipes::where('ing','LIKE','%$checked[0]%')->orwhere('ing','LIKE','%$checked[1]%')->orwhere('ing','LIKE','%$checked[2]%')->orwhere('ing','LIKE','%$checked[3]%')->orwhere('ing','LIKE','%$checked[4]%')->orwhere('ing','LIKE','%$checked[5]%')->orwhere('ing','LIKE','%$checked[6]%')->orwhere('ing','LIKE','%$checked[7]%')->orwhere('ing','LIKE','%$checked[8]%')->orwhere('ing','LIKE','%$checked[9]%')->orwhere('ing','LIKE','%$checked[10]%')->orwhere('ing','LIKE','%$checked[11]%')->orwhere('ing','LIKE','%$checked[12]%')->orwhere('ing','LIKE','%$checked[13]%')->orwhere('ing','LIKE','%$checked[14]%')->orwhere('ing','LIKE','%$checked[15]%')->orwhere('ing','LIKE','%$checked[16]%')->orwhere('ing','LIKE','%$checked[17]%')->get();

                case 19: 
                    $recipe=Recipes::where('ing','LIKE','%$checked[0]%')->orwhere('ing','LIKE','%$checked[1]%')->orwhere('ing','LIKE','%$checked[2]%')->orwhere('ing','LIKE','%$checked[3]%')->orwhere('ing','LIKE','%$checked[4]%')->orwhere('ing','LIKE','%$checked[5]%')->orwhere('ing','LIKE','%$checked[6]%')->orwhere('ing','LIKE','%$checked[7]%')->orwhere('ing','LIKE','%$checked[8]%')->orwhere('ing','LIKE','%$checked[9]%')->orwhere('ing','LIKE','%$checked[10]%')->orwhere('ing','LIKE','%$checked[11]%')->orwhere('ing','LIKE','%$checked[12]%')->orwhere('ing','LIKE','%$checked[13]%')->orwhere('ing','LIKE','%$checked[14]%')->orwhere('ing','LIKE','%$checked[15]%')->orwhere('ing','LIKE','%$checked[16]%')->orwhere('ing','LIKE','%$checked[17]%')->orwhere('ing','LIKE','%$checked[18]%')->get();

                    break;
                case 20: 
                    $recipe=Recipes::where('ing','LIKE','%$checked[0]%')->orwhere('ing','LIKE','%$checked[1]%')->orwhere('ing','LIKE','%$checked[2]%')->orwhere('ing','LIKE','%$checked[3]%')->orwhere('ing','LIKE','%$checked[4]%')->orwhere('ing','LIKE','%$checked[5]%')->orwhere('ing','LIKE','%$checked[6]%')->orwhere('ing','LIKE','%$checked[7]%')->orwhere('ing','LIKE','%$checked[8]%')->orwhere('ing','LIKE','%$checked[9]%')->orwhere('ing','LIKE','%$checked[10]%')->orwhere('ing','LIKE','%$checked[11]%')->orwhere('ing','LIKE','%$checked[12]%')->orwhere('ing','LIKE','%$checked[13]%')->orwhere('ing','LIKE','%$checked[14]%')->orwhere('ing','LIKE','%$checked[15]%')->orwhere('ing','LIKE','%$checked[16]%')->orwhere('ing','LIKE','%$checked[17]%')->orwhere('ing','LIKE','%$checked[18]%')->orwhere('ing','LIKE','%$checked[19]%')->get();

                    break;

            }

            }
            // $recipe = Recipes::where('ing','LIKE',"%$checked[0]%")->orwhere('ing','LIKE',"%$checked[1]%")->get();
            // // $recipe = Recipes::where('ing','LIKE',"%$key%")->orwhere('ing','LIKE',"%$key")->orwhere('ing','LIKE',"$key%")->get();
            
            // $recipe = Recipes::where('ing','LIKE',"%$input%")->get();
        else{
            $recipe = Recipes::all();
        }
        $rating=Rating::all();                 
        
        
        ##thisone      
        // $filter=$request['filter[]']??"";
        // if($filter!=""){
        //         //where
        //         $recipe = Recipes::get('filter')
                
        // } else{
        //     $recipe = Recipes::all();
        // }
        //$recipe = Recipes::all();
        return view('frontend.recipe',compact('recipe','rating'));
    }

    public function postshowuser($id){
        $post = Posts::where('id',$id)->first();
        return view('frontend.show',compact('post'));
    }

    public function categorypost($category_id){
        $posts = Posts::where('category_id',$category_id)->get();
        $category = Categories::all();
        // dd($posts);

        return view('frontend.displaypost',compact('posts','category'));
    }

    public function displaydata(){
        return view('frontend.diet');
    }

    public function show($slug)
    {
        $post = Posts::where('id',$slug)->first();
        return view('home.show',compact('post'));
    }
    

}
