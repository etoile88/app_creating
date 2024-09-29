<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\SearchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::controller(PostController::class)->middleware(['auth'])->group(function () {
    //上から順にルーティングを見ていくから順番大事
    //基本的なwebページのルート
    Route::get('/', 'index')->name('index');
    Route::get('/posts/post', 'post')->name('post');
    Route::post('/', 'store')->name('store');
    Route::get('/posts/{post}', 'show')->name('show');
    });
    
Route::controller(CommentController::class)->middleware(['auth'])->group(function () {
    Route::get('/posts/comment', 'comment')->name('comment');
    Route::post('/posts/{post}/comment', 'create')->name('create');//ここのルートをどうすればいいかわからない
    Route::post('/posts', 'store2')->name('store2');
    });

Route::controller(ProfileController::class)->middleware(['auth'])->group(function () {
    Route::get('/user', 'profile')->name('profile');
    Route::delete('/user/{post}', 'delete')->name('delete');
});

Route::controller(LikesController::class)->middleware(['auth'])->group(function () {
    Route::post('posts/{id}/like', 'unlike')->name('unlike');
    Route::post('posts/{id}/unlike', 'like')->name('like');
    
});

Route::controller(SearchController::class)->middleware(['auth'])->group(function () {
    Route::get('/search', 'search')->name('search');
    Route::get('/searchsongs', 'searchsongs')->name('searchsongs');
});

Route::controller(FollowUserController::class)->middleware(['auth'])->group(function () {
    Route::post('/users/{user}/follow', 'follow')->name('follow');
    Route::post('/users/{user}/unfollow', 'unfollow')->name('unfollow');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
