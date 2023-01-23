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

Route::middleware(['admin'])->group(function () {
  Route::get('admin/posts/create', [AdminPostController::class, 'create'])->name('createPost');
  Route::get('admin/posts', [AdminPostController::class, 'index'])->name('adminAllPosts');
  Route::post('admin/posts', [AdminPostController::class, 'store']);
  Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit']);
  Route::patch('admin/posts/{post}', [AdminPostController::class, 'update']);
  Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy']);
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
