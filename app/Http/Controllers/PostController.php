<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $posts=Post::where("user_id",auth::id())->get();
        return view('posts.index')->with('post',$posts);
    }
    public function welcome()
    {
        $posts=Post::all();
        return view('welcome')->with('post',$posts);
    }
    public function postsTrashed()
    {
        $posts=Post::onlyTrashed()->where("user_id",auth::id())->get();
        return view('posts.onlyTrashed')->with('posts',$posts);

    }


    public function create()
    {
        return view('posts.create');
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            "title" => "required",
            "content" => "required",
            "photo" => "required|image",
        ]);
        $photo = $request->photo;
        $NewPhoto = time().$photo->getClientOriginalExtension();
        $photo->move('uploads/posts/',$NewPhoto);
         $post=Post::create([
            "user_id" =>Auth::id() ,
            "title" => $request->title,
            "content" => $request->content,
            "photo" => 'uploads/posts/'.$NewPhoto,
            "slug"=>str::slug($request->title),
         ]);
         return redirect()->back();
    }


    public function show( $slug)
    {
        $posts=Post::where('slug', $slug)->first();
        return view('posts.show')->with('post',$posts);;
    }


    public function edit( $id)
    {
        $posts=Post::find($id);
        return view('posts.edit')->with('post',$posts);;
    }

    public function update(Request $request,$id)
    {
        $post=Post::find( $id);
        $this->validate($request,[
            "title" => "required",
            "content" => "required",

        ]);
        if($request->has('photo')){
            $photo = $request->photo;
        $NewPhoto = time().$photo->getClientOriginalExtension();
        $photo->move('uploads/posts/',$NewPhoto);
        $post->photo='uploads/posts/'.$NewPhoto;
        }
        $post->title=$request->title;
        $post->content=$request->content;
        $post->update();
        return redirect()->back();
    }


    public function destroy( $id)
    {
        $post=Post::find($id);
        $post->delete();
        return redirect()->back();
    }
    public function hdelete($id)
    {
        $post=Post::withTrashed()->where('id',$id)->first();
        $post->forceDelete();
        return redirect()->back();
    }
    public function restore( $id)
    {
        $post=Post::withTrashed()->where('id',$id)->first();
        $post->restore();
        return redirect()->back();
    }
}
