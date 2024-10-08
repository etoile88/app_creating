<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Like;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;
use Cloudinary;//Cloudinary使うためのuse宣言
use Illuminate\Support\Facades\DB;//DBを使うためのuse宣言



class PostController extends Controller
{
    public function index(Post $post)
    {//インポートしたPostをインスタンス化して$postとして使用。
        $post = Post::orderBy('created_at', 'DESC');
        return view('posts.index')->with(['posts' => $post->get()]);
    }
    
    public function show(Post $post)
    {
        Post::orderBy("created_at", "DESC")->get();
        $comments = Comment::where('post_id', $post->id)->get();//データの絞り込み方法
        return view('posts.show')->with(['post' => $post, 'comments' => $comments]);
    }
    
    public function post(Post $post)
    {
        $categories = DB::table('categories')->get();//DBからテーブルの中身をとってきて変数に代入
        return view('posts.post')->with(['posts' => $post->get(), 'categories' => $categories]);
    }
    
    public function store(PostRequest $request, Post $post, Category $categories)
    {
        //dd($request);
        $input = $request['post'];
        //dd($image_url);
        if($request->file('image')){//画像ファイルが送られた時だけ処理
            $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();//fileの()の中身はpost.bladeのname属性
            $input += ['image_url' => $image_url]; //追加
        }

        $input['user_id'] = Auth::id();
        $post->fill($input)->save();
        
        return redirect('/posts/' . $post->id); 
        
    }
}
