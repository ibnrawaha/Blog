<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\Comment;
// use App\User;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->get();


        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|max:2048|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if($request->hasFile('image')){
            // TO GET THE REAL FILE NAME
            $file = $request->file('image')->getClientOriginalName();
            $fileExplode = explode('.', $file);
            $fileToStore = $fileExplode[0]. time() . "." .  $fileExplode[1];
            // MUST BE ADDED TO DECLARE THE PATH
            $path = $request->file('image')->storeAs('public/image', $fileToStore);
        }
        else {
            // IF THERE ARE NO IMAGES
            $fileToStore = 'noImage.jpg';
        }



        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = auth()->user()->id;
        $post->image = $fileToStore;
        $post->save();

        // return $post->image;
        return redirect('/posts')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $comments = Comment::orderBy('id', 'asc')->where('post_id', '=', $id)->get();

        return view('posts.show')->with('post',$post)->with('comments', $comments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $post = Post::find($id);

        if(auth()->user()->id == $post->user_id){
            return view('posts.edit')->with('post',$post);
        }
        else{
            // return redirect('/posts')->with('error', 'An Unauthorized Page');
            return view('error.404');
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
        ]);

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();
        
        return redirect('/posts/'.$post->id)->with('post', $post);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        
        if(auth()->user()->id == $post->user_id){
            $post->delete();

            return redirect('/dashboard')->with('error', 'Post Deleted !');
        }
        else{
            // return redirect('/posts')->with('error', 'An Unauthorized Page');
            return view('error.404');
        }



    }
}
