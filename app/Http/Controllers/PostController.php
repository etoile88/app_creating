<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Http\Requests\PostRequest;
use App\Models\Comment;



class PostController extends Controller
{
    public function index(Post $post)//レバテックみての文
    {//インポートしたPostをインスタンス化して$postとして使用。
        return view('posts.index')->with(['posts' => $post->get()]);
    }
    public function show(Post $post)
    {
        $comments = Comment::where('post_id', $post->id)->get();

        return view('posts.show')->with(['post' => $post, 'comments' => $comments]);
    }
    public function post(Post $post)
    {
        return view('posts.post')->with(['posts' => $post->get()]);//with以降はこれでいいかわからん
    }
    public function store(PostRequest $request, Post $post)
    {
        dd($request);
        $input = $request['post'];
        $post->fill($input)->save();
        
        return rediret('/posts/' . $post->id);
        
    }
}
