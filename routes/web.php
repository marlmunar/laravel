<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\VarDumper\VarDumper;

Route::get('/', function () {
    //getAllPosts
    // $posts = Post::all();

    //getPostsSpecifictoUser
    // $posts = Post::where("user_id", Auth::id())->get();
    $posts = [];
    if(Auth::check()) {
        $posts = Auth::user()->userPosts()->latest()->get();
    }

    return view('home', ['posts' => $posts]);
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);

Route::post('/create-post', [PostController::class, 'createPost']);
Route::get('/edit-post/{post}', [PostController::class, 'getEditScreen']);
Route::put('/edit-post/{post}', [PostController::class, 'updatePost']);