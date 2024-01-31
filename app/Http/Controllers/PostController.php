<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Categories;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        
        $posts = Posts::with('category')->get();
        // $posts = Posts::all();
        //dd($posts);
        return view('admin.post.index',compact('posts'));
    }

    public function categorypost($category_id){
        $posts = Posts::where('category_id',$category_id)->get();
        $category = Categories::all();
        // dd($posts);

        return view('admin.display.index',compact('posts','category'));
    }

    public function postshowadmin($id){
        $post = Posts::where('id',$id)->first();
        return view('admin.display.single',compact('post'));
    }

    public function showcategory(){
        $posts = Posts::all();
        $category = Categories::all();
        return view('admin.display.index',compact('posts','category'));
    }

    public function create()
    {
        // use tag for posts
        //$tags = Tag::all();
        $categories = Categories::all();
        return view('admin.post.create',compact(['categories']));
    }

    public function store(Request $request)
    {
        // dd($request->all());
       $this->validate($request,[
            'title'=>'required|unique:posts,title',
            'image'=>'required|image',
            'discription'=>'required',
            'category'=>'required',
            'sub_title'=>'required',
            'video'=>'required',
           
            


        ]);
        $posts = posts::create([
            'title'=>$request->title,
            'image'=>'image.jpg',
            'video'=>$request->video,
            
            'calories'=>$request->calories,
            'cookingtime'=>$request->cookingtime,
            'category_id'=>$request->category,
            'slug' => Str::slug($request->title),
            'sub_title'=>$request->sub_title,
            'discription'=>$request->discription,
            'user_id' => auth()->user()->id,
            'published_at' =>Carbon::now(),

        ]);
        // posts ta attach kore dilam j tag gula request e asbe
        //$posts->tags()->attach($request->tags);

        if($request->has('image')){

            $image = $request->image;
            $image_new_name = time().'.'.$image->getClientOriginalExtension();
            $image->move('storage/posts/',$image_new_name);
            $posts->image=$image_new_name;
            $posts->save();
        }

        session()->flash('success','posts created Successfully');

        return redirect()->back();
    }


    public function show($id)
    {
        $posts = Posts::where('id',$id)->first();
        return view('admin.post.show',compact('posts'));
    }


    public function edit($id)
    {
        // tag gula show korbo edit option tai data pathalam
        // $tags = Tag::all();
        $posts = Posts::where('id',$id)->first();
        $categories = Categories::all();
         return view('admin.post.edit',compact('posts','categories'));
    }


    public function Update(Request $request, $id)
    {
        $post = Posts::findOrFail($id);
        // dd($post);
        $this->validate($request,[
            'title' =>'required',
            'discription' =>'required',
            'category' => 'required',
        ]);
      
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->discription = $request->discription;
        $post->cookingtime = $request->cookingtime;
        $post->video = $request->video;
        $post->calories= $request->calories;
        $post->category_id = $request->category;
        $post->sub_title = $request->subtitle;
        $post->user_id = auth()->user()->id;
        $post->updated_at=Carbon::now();

        
         if($request->hasFile('image')){
             $image = $request->image;
             $image_new_name = time().'.'.$image->getClientOriginalExtension();
             $image->move('storage/posts/',$image_new_name);
             $post->image = $image_new_name;
         }
        $post->save();

        Session()->flash('success','posts update Successfully');
        return redirect()->back();
    }

    public function destroy($id)
    {
        // Find the post you want to delete
        $post = Posts::find($id);

        // Ensure the post exists
        if (!$post) {
            return back()->with('error', 'Post not found.');
        }
        // Delete the associated image file from storage
        if ($post->image) {
            Storage::delete($post->image);
        }

        // Delete the post
        $post->delete();

        return redirect()->route('Posts.index')->with('success', 'Post deleted successfully.');
    }
}
