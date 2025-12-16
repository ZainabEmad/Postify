<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Database\Schema\PostgresBuilder;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/home', function () {
//     return view('home');
// });

Route::get('/home',[PostController::class, 'showAllPosts'])
->name('homepage');

Route::get('/search/post', [PostController::class, 'searchPost'])
     ->name('search.post');

Route::middleware('auth')->group(function(){

     Route::get('/posts', [PostController::class, 'getAllPosts'])
          ->name('posts.index');
     
     Route::get('/posts/create', [PostController::class, 'createPost'])
          ->name('create.post');
     
     Route::get('/posts/details/{id}',[PostController::class, 'showDetailsOfOnePost'])
     ->name('details.post');
     
     Route::get('/posts/edit/{id}',[PostController::class, 'editPost'])
          ->name('edit.post');
     
     Route::post('/posts/store', [PostController::class, 'storePost'])
          ->name('store.post');
     
     Route::put('posts/update/{id}', [PostController::class, 'update'])
          ->name('posts.update');
     
     Route::delete('/posts/{id}', [PostController::class, 'destroy'])
          ->name('posts.destroy');
     
     
    Route::resource('/users', UserController::class)
     ->middleware('can:viewAny,App\Models\User');
     
     Route::get('/users/posts/{id}', [UserController::class, 'posts'])
          ->name('user.posts');
     
     Route::resource('/tags',TagController::class);

});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
