<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Http\Requests\CommentRequest;


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
    public function upload(CommentRequest $request, Commnet $comment)
    {
        $input = $request['comment'];//blade.phpのname属性と一致している必要がある。
        $comment->fill($input)->save();
        return redirect('/posts/{post}/comment' .$comment->id);//redirectの中身よくわからんポストも作ってないから
    }    
}
