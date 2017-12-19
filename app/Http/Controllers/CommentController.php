<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Post;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comment = new Comment;

        $this->validate($request ,[
            'comment' => 'required',
            ]);

        if(auth()->user()){
            $user = auth()->user()->id;
        }
        else {
            $user = 0;
        }

        // dd($request);
        $comment->comment = $request->input('comment');
        $comment->user_id = $user;
        $comment->post_id = $request->input('post_id');
        
        $comment->save();

        return redirect('/posts/'. $comment->post_id .'/'. $request->input('post_title'))->with('comment', $comment);



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $count = $request->newCommentsCount;
        if($request->data){
            $stat = "YES";
        }
        else {
            $stat = "NO";
        }
        $post = Post::find($id);

        $comments = Comment::orderBy('id', 'asc')->where('post_id', '=', $id)->limit($count)->get();

        return view('posts.show')->with('post' ,$post)->with('comments', $comments)->with('stat', $stat);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy($post_id, $comment_id)
    {
        
        $comment = Comment::where('post_id', $post_id)->where('id', $comment_id)->get()->first();

        $comment->delete();

        return redirect('/posts/'. $post_id)->with('error', 'Comment Deleted');
    }
}
