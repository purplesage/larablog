<?php

use App\Http\Controllers\AdminPostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsletterController;


Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('post/{post:slug}', [PostController::class, 'show']);

Route::middleware(['can:admin'])->group(function () {
  Route::resource('admin/posts', AdminPostController::class)->except('show');
});

Route::middleware(['guest'])->group(function () {
  Route::get('register', [RegisterController::class, 'create']);
  Route::post('register', [RegisterController::class, 'store']);
  Route::get('login', [SessionsController::class, 'create']);
  Route::post('login', [SessionsController::class, 'store']);
});

Route::middleware(['auth'])->group(function () {
  Route::post('logout', [SessionsController::class, 'destroy']);
  Route::post('posts/{post:slug}/comment', [CommentController::class, 'store']);
});

Route::post('newsletter', NewsletterController::class);
