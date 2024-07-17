<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;


class PostController extends Controller
{
    public function index(Post $post)//レバテックみての文
    {//インポートしたPostをインスタンス化して$postとして使用。
        return view('posts.index')->with(['posts' => $post->get()]);
    }
    public function comment($comment)
    {
        return view('posts.comment')->with(['comment' => $comment]);
    }
}
