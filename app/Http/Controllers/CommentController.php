<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Category;
use App\Http\Requests\CommentRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function comment($comment)
    {
        return view('posts.comment')->with(['comment' => $comment]);
    }
    public function create(Post $post, Comment $comment, Request $request)
    {
        $comment->post_id = $post->id;
        $comment->user_id = Auth::id();
        $comment->body = $request->comment;//showのdivのtextareaの名前と同じものを受け取っている
        $comment->save();
       //dd($comment);
        return redirect('/posts/' .$post->id);//.redirectの中身理解
    }    
    public function store(Request $request)
    {
        dd($request);
        return rediret('/posts/' . $post->id);
        
    }
}
