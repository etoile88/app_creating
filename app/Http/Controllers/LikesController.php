<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;


class LikesController extends Controller
{
    public function __construct()
    {
        // only()の引数内のメソッドはログイン時のみ有効
        $this->middleware(['auth', 'verified'])->only(['like', 'unlike']);
    }
 
    public function like($id)
    {
        Like::create([
            'post_id' => $id,
            'user_id' => Auth::id(),
        ]);
        //dd($id);
        
        return redirect()->back();
    }
    
    public function unlike($id)
    {
        //絞り込み
        $like = Like::where('post_id', $id)->where('user_id', Auth::id())->first();//一度いいねしたidを探すコード
        if ($like) {
            $like->delete();
        }
        return redirect()->back();
    }
}
