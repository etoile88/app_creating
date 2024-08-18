<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //
    public function post(Category $categories)
    {
        $categories = Category::all(); // 全カテゴリーを取得
        return view('posts.post', compact('categories')); // ビューにデータを渡す
    }
}
