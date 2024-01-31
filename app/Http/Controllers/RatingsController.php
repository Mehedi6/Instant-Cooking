<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
use Auth;


class RatingsController extends Controller
{
    public function addRating(Request $request){
        // if(!Auth::check()){
        //     return $message="Login to";
        // }
        // else{
        //     return $message="Added";
        // }
        if($request->isMethod('post')){
            $data=$request->all();
            // echo"<pre>";print_r($data); die;
            $ratingCount=Rating::where(['user_id'=>Auth::user()->id,'recipe_id'=>$data['recipe_id']])->count();
            if($ratingCount<0){
                $message="Your rating already exists for this recipe";
                return redirect()->back()->with('error_message',$message);
            }
            else{
                $rating=new Rating;
                $rating->user_id=Auth::user()->id;
                $rating->recipe_id=$data['recipe_id'];
                $rating->review=$data['feedback'];
                $rating->rating=$data['rating'];
                $rating->save();
                $message="Your rating already exists for this recipe";
                return redirect()->back()->with('error_message',$message);
            }
        }
        return $recipe_id=$request->input('recipe_id');

    }
    
}
