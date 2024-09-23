<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\SoftDeletes;//delete機能のuse宣言
use Illuminate\View\View;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use App\Models\User;
use Cloudinary;//Cloudinary使うためのuse宣言

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    
    public function profile(Post $post, Category $categories)
    {
        $post = Post::where('user_id', Auth::user()->id)->get();//自分の投稿のみに絞り込み
        $post = Post::orderBy("created_at", "DESC")->get();
        return view('posts.profile')->with(['posts' => $post, 'categories' => $categories]);
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/user');
    }
}
