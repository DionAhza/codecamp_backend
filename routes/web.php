<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/',[PostController::class, 'index']);

Route::get('/login', function(){
 return view('auth.login');
});
Route::get('/register', function(){
 return view('auth.register');
});

Route::post('/register/auth',[AuthController::class, 'register'])->name('register');
Route::post('/login/auth', [AuthController::class, 'login'])->name('login');
Route::post('/post/create',[PostController::class, 'store'])->name('post.store');
Route::delete('/post/delete/{id}', [PostController::class, 'destroy'])->name('post.delete');
Route::get('/post/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
Route::get('/post/clear', [PostController::class, 'clear'])->name('post.clear');
Route::post('/comment/{post}', [CommentController::class, 'store'])->name('comment.store');
Route::get('logout',[AuthController::class,'logout'])->name('logout');