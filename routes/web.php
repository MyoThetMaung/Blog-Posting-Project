<?php

use App\Models\Blog;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;

Route::get('/', [BlogController::class,'index']);

Route::get('/register', [AuthController::class,'create'])->middleware('guest');
Route::post('/register', [AuthController::class,'store'])->middleware('guest');

Route::post('/logout', [AuthController::class,'logout'])->middleware('auth');

Route::get('/login', [AuthController::class,'login'])->middleware('guest');
Route::post('/login', [AuthController::class,'post_login'])->middleware('guest');

Route::post('/blogs/{blog:slug}/comments', [CommentController::class,'store']);

Route::get('/blogs/{blog:slug}', [BlogController::class,'show']);












// Route::get('/users/{user:username}', function (User $user) {
//     return view('blogs', [
//         'blogs' => $user->blogs->load('category','author')
//     ]);
// });


// Route::get('/categories/{category:name}', function (Category $category) {
//     return view('blogs', [
//         'blogs' => $category->blogs->load('category','author'),                          //eager loading or lazy loading | fetching all blogs with their categories before looping through them
//         'categories' => Category::all(),
//         'currentCategory' => $category->name
//     ]);
// });





