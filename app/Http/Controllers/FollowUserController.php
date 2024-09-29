<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Following;
use App\Models\User;
use App\Models\Post;

class FollowUserController extends Controller
{
    // フォロー機能
    public function follow(User $user)
    {
        Following::create([
            'user_id' => auth()->id(), // 現在のユーザーID
            'following_user_id' => $user->id, // フォローされたユーザーID
        ]);
        
        // 投稿データを取得
        $posts = Post::where('user_id', $user->id)->get();

        // フォロー数を取得
        $followCount = Following::where('following_user_id', $user->id)->count();

        // 現在のユーザがフォローしているかどうかを確認
        $isFollowed = auth()->user()->follows()->where('following_user_id', $user->id)->exists();

        return view('posts.profile')->with([
            'posts' => $posts, // ここを修正
            'followCount' => $followCount,
            'isFollowed' => $isFollowed,
        ]);
    }

    // フォロー解除機能
    public function unfollow(User $user)
    {
        $follow = Following::where('user_id', auth()->id())
                            ->where('following_user_id', $user->id)
                            ->first();

        if ($follow) {
            $follow->delete();
        }

        // 投稿データを取得
        $posts = Post::where('user_id', $user->id)->get(); // ここも修正

        // フォロー数を取得
        $followCount = Following::where('following_user_id', $user->id)->count();

        // 現在のユーザがフォローしているかどうかを確認
        $isFollowed = auth()->user()->follows()->where('following_user_id', $user->id)->exists();

        return view('posts.profile')->with([
            'posts' => $posts, // ここも修正
            'followCount' => $followCount,
            'isFollowed' => $isFollowed,
        ]);
    }
}
