<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Database\Schema\PostgresBuilder;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[PostController::class, 'showAllPosts'])
     ->name('homepage');

Route::get('/posts', [PostController::class, 'getAllPosts'])
     ->name('posts.index');

Route::get('/create/post', [PostController::class, 'createPost'])
     ->name('create.post');

Route::get('details/post/{id}',[PostController::class, 'showDetailsOfOnePost'])
->name('details.post');

Route::get('/edit/post/{id}',[PostController::class, 'editPost'])
     ->name('edit.post');

Route::post('store/posts', [PostController::class, 'storePost'])
     ->name('store.post');

Route::put('posts/update/{id}', [PostController::class, 'update'])
     ->name('posts.update');

Route::delete('/posts/{id}', [PostController::class, 'destroy'])
     ->name('posts.destroy');

Route::get('/search/post', [PostController::class, 'searchPost'])
     ->name('search.post');


Route::resource('/users', UserController::class);

Route::get('/user/posts/{id}', [UserController::class, 'posts'])
     ->name('user.posts');