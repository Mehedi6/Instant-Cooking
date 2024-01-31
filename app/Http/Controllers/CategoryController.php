<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\GluteenFree;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $catagories = Categories::orderBy('created_at','DESC')->paginate(20);
        return view('admin.category.index',compact('catagories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.category.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // validation
        $this->validate($request,[
            'name'=>'required|unique:categories,name',
        ]);

        $Categories = Categories::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name,'_'),
            'description'=>$request->description,
        ]);

        session()->flash('success','Categories created Successfully');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categories  $Categories
     * @return \Illuminate\Http\Response
     */
    public function show(Categories $Categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categories  $Categories
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Categories = Categories::findOrFail($id);

        return view('admin.category.edit',compact('Categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categories  $Categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateitem = Categories::findOrFail($id);

         $this->validate($request,[
            'name'=>'required|unique:categories,name,$Categories->name',
        ]);

        

        $updateitem ->name = $request->name;
        $updateitem ->slug = Str::slug($request->name,'_');
        $updateitem ->description = $request->description;
        $updateitem->save();
       

        session()->flash('success','Categories created Successfully');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categories  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd('Destroy method called!', $category);
        $deldata = Categories::findOrFail($id);


        if ($deldata) {
            $deldata->delete();
            session()->flash('success', 'Category deleted successfully');
        }
    
        return redirect()->route('Category.index');
        
    }
}
