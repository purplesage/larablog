<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('post/{post:slug}', [PostController::class, 'show']);

Route::middleware(['guest'])->group(function () {
  Route::get('register', [RegisterController::class, 'create']);
  Route::post('register', [RegisterController::class, 'store']);
  Route::get('login', [SessionsController::class, 'create']);
  Route::post('login', [SessionsController::class, 'store']);
});

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');
