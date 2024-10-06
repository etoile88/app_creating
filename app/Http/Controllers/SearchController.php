<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Cloudinary;//Cloudinary使うためのuse宣言
use Illuminate\Support\Facades\DB;//DBを使うためのuse宣言
use Illuminate\Pagination\Paginator;

class SearchController extends Controller
{//ここ理解
    public function search(Request $request, Category $categories, Post $post)
    {
        $posts = Post::Paginate(15);
        $categories = DB::table('categories')->get();//
        $searchWord = $request->input('searchWord');
        $categoryId = $request->input('categoryId');

        return view('posts.search', [
            'posts' => $posts,
            'categories' => $categories,//全カテゴリのリスト
            'searchWord' => $searchWord,//検索語
            'categoryId' => $categoryId,//選択されたカテゴリのＩＤ
        ]);
    }
    
    public function searchsongs(Request $request)
    {
        //入力される値nameの中身を定義する
        $searchWord = $request->input('searchWord'); //検索語の値
        $categoryId = $request->input('categoryId'); //カテゴリの値
        
        //dd($searchWord);
        
        $query = Post::query();
        
        if (isset($searchWord)) {
            $escapedSearchWord = self::escapeLike($searchWord);
        
            $query->where(function ($query) use ($escapedSearchWord) {
                $query->where('song', 'like', '%' . $escapedSearchWord . '%')//songカラム
                      ->orWhere('artist', 'like', '%' . $escapedSearchWord . '%');//artisatカラム
            });
}

        //カテゴリが選択された場合、categoriesテーブルからcategory_idが一致するものを$queryに代入
        if (isset($categoryId)) {
            $query->where('category_id', $categoryId);
        }
        //dd($query);
        //$queryをcategory_idの昇順に並び替えて$productsに代入
        $posts = $query->orderBy('category_id', 'asc')->paginate(15);


        $categories = DB::table('categories')->get();//DBからテーブルの中身をとってきて変数に代入
        
        //dd($categories);

        return view('posts.search', [
            'posts' => $posts,
            'categories' => $categories,
            'searchWord' => $searchWord,
            'categoryId' => $categoryId,
        ]);
    }
    
    public static function escapeLike($str)
    {
        return str_replace(['\\', '%', '_'], ['\\\\', '\%', '\_'], $str);
    }
}
