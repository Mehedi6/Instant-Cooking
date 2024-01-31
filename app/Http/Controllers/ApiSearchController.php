<?php

namespace App\Http\Controllers;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Contracts\Session\Session;
use App\Models\Post;

class ApiSearchController extends Controller
{
    public function search()
    {   $RandomDetails=[];
        for ($i = 0; $i < 20; $i++) {
            $response1 = Http::withoutVerifying()->get('https://www.themealdb.com/api/json/v1/1/random.php');
            if ($response1->successful()) {
                $Details = $response1->json()['meals'][0];
                $RandomDetails[]=$Details;
                
            }
        }
        //return $RandomDetails;
        return view('api_index1',compact('RandomDetails'));
    }
    public function back()
    {
        return view('frontend/recipe');
    }
    public function fetchRecipes(Request $request)
    {
        $appId = 'd7918092';
        $appKey = '46e4cb01abd520e74e16a7a5fb0ce5e4';
        $query = $request->input('query');
        
        // $response = Http::withoutVerifying()->get("https://www.themealdb.com/api/json/v1/1/lookup.php?i={$mealId}");
        
        $response = Http::withoutVerifying()->get("www.themealdb.com/api/json/v1/1/filter.php?i={$query}");
        // $response = Http::withoutVerifying()->get("https://api.edamam.com/search?q=chicken&app_id=d7918092&app_key=46e4cb01abd520e74e16a7a5fb0ce5e4");
            if ($response->successful()) {
                $mealDetails = $response->json()['meals'];
                // $recipes = $response->json()['hits'];
                if (!empty($mealDetails['meals'])) {
                    return view('api_index', compact('mealDetails'));
                }
                else{
                    $response2=Http::withoutVerifying()->get("www.themealdb.com/api/json/v1/1/search.php?s={$query}");
                    if($response2->successful()){
                        $mealDetails = $response2->json()['meals'];
                        if (empty($mealDetails['meals'])){
                            return view('api_index', compact('mealDetails'));
                        }
                        else
                            return redirect()->back()->withErrors(['error' => 'No search results found.']);
                    }
                    else
                    
                        return redirect()->back()->withErrors(['error' => 'No search results found.']);
                }
            } 
            else {
                
                return redirect()->back()->withErrors(['error' => 'No search results found.']);
            }

        // if ($response->successful()) {
        //     $data = $response->json();
        //     // Process and return the fetched recipe data
        //     return $data;
        // } else {
        //     // Handle error response
        //     return response()->json(['error' => 'API request failed'], $response->status());
        // }
    }
    public function show($mealId)
    {
        $response = Http::withoutVerifying()->get("https://www.themealdb.com/api/json/v1/1/lookup.php?i={$mealId}");

        if ($response->successful()) {
            $mealDetail = $response->json()['meals'][0];
            $mealIngredients = [];
            for ($i = 1; $i <= 20; $i++) {
                if (!empty($mealDetail["strIngredient{$i}"])) {
                    $mealIngredients[] = "{$mealDetail["strIngredient{$i}"]} - {$mealDetail["strMeasure{$i}"]}";
                }
            }
            
            //return view('show', compact('mealDetail', 'mealIngredients'));
            return view('show', compact('mealDetail', 'mealIngredients'));
        } else {
            // Handle error response
            return redirect()->back()->with('error', 'Failed to fetch meal details.');
            //return view('show', ['error'=>'Failed to fetch meal details.']);
        }
    }
}
