<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsletterController;


Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('post/{post:slug}', [PostController::class, 'show']);

Route::get('admin/posts/create', [PostController::class, 'create'])->middleware('admin');
Route::post('admin/posts', [PostController::class, 'store'])->middleware('admin');

Route::middleware(['guest'])->group(function () {
  Route::get('register', [RegisterController::class, 'create']);
  Route::post('register', [RegisterController::class, 'store']);
  Route::get('login', [SessionsController::class, 'create']);
  Route::post('login', [SessionsController::class, 'store']);
});

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');
Route::post('posts/{post:slug}/comment', [CommentController::class, 'store'])->middleware('auth');

Route::post('newsletter', NewsletterController::class);
