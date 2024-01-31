<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Recipes;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Storage;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipes::paginate(4);
        return view('admin.recipe.index',compact('recipes'));
    }
    public function recipesingle($id){
        $receipes = Recipes::where('id',$id)->first();
        return view('admin.recipe.show',compact('recipes'));
    }
    
    public function create()
    {
        return view('admin.recipe.create');
    }

    public function store(Request $request)
    {
        $rules=[
        "recipe_name"=>"required|max:20",
        "category"=>"required|max:20",
        "recipe_description"=>"required|max:400",
        "ing"=>"required|max:10",
        "image"=>"required"
        ];
        $this->validate($request,$rules);

        $input = $request->all();

        $ingredients=$input['ing'];
        $input['ing']=implode(",",$ingredients);
        

        $image=$input['image'];
        $image_new_name = time().'.'.$image->getClientOriginalExtension();
        $image->move('storage/recipe/',$image_new_name);
        $input['image']=$image_new_name;

        
        Recipes::create($input);
       
        session()->flash('success','Recipe Added Successfully');
        return redirect('Recipe');
    }
    public function show($id)
    {
        $recipe = Recipes::where('id',$id)->first();
        return view('admin.recipe.show',compact('recipe'));
    }

    public function destroy($id)
    {
        // Find the receipe you want to delete
        $recipe = Recipes::find($id);

        // Ensure the receipe exists
        if (!$recipe) {
            return back()->with('error', 'recipe not found.');
        }
        // Delete the associated image file from storage
        if ($recipe->image) {
            Storage::delete($recipe->image);
        }

        // Delete the receipe
        $recipe->delete();

        return redirect()->route('Recipe.index')->with('success', 'recipe deleted successfully.');
    }
    
    public function edit($id=null)
    {
        $recipe = Recipes::where('id',$id)->first();

        //dd($receipe);
         return view('admin.recipe.edit',compact('recipe'));
    }

    public function update(Request $request, $id)
    {
        $rules=[
        "recipe_name"=>"required|max:20",
        "category"=>"required|max:20",
        "recipe_description"=>"required|max:400",
        "ing"=>"required|max:10",
        "image"=>"required"
        ];

        $this->validate($request,$rules);

        $input = $request->recipe($id);

        $ingredients=$input['ing'];
        $input['ing']=implode(",",$ingredients);
        

        $image=$input['image'];
        $image_new_name = time().'.'.$image->getClientOriginalExtension();
        $image->move('storage/recipe/',$image_new_name);
        $input['image']=$image_new_name;

        
        Recipes::create($input);
       
        session()->flash('success','Recipe Updated Successfully');
        return redirect('Recipe');
    }


}
