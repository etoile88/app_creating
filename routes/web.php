<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
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
    Route::get('/', 'index')->name('index');
    Route::get('/posts/post', 'post')->name('post');
    Route::post('/', 'store')->name('store');
    Route::get('/posts/{post}', 'show')->name('show');
    Route::delete('posts/{post}', 'delete')->name('delete');
    });
    
Route::controller(CommentController::class)->middleware(['auth'])->group(function () {
    Route::get('/posts/comment', 'comment')->name('comment');
    Route::post('/posts/{post}/comment', 'create')->name('create');//ここのルートをどうすればいいかわからない
    Route::post('/posts', 'store2')->name('store2');
    });
//基本的なwebページのルート
// Route::controller(PostController::class)->middleware(['auth'])->group(function () {
//     //上から順にルーティングを見ていくから順番大事
//     Route::post('/posts', 'store')->name('store');
//     Route::get('/', 'index')->name('index');
//     Route::get('/posts/post', 'post')->name('post');

//     });
    
// Route::controller(CommentController::class)->middleware(['auth'])->group(function () {
//     Route::get('/posts/comment', 'comment')->name('comment');
//     Route::post('/posts/{post}/comment', 'upload')->name('upload');//ここのルートをどうすればいいかわからない
//     Route::post('/posts', 'store')->name('store');
// });



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
