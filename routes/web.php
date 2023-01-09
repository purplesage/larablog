<?php

use App\Http\Controllers\CategoryController;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('post/{post:slug}', [PostController::class, 'show']);

Route::get('categories/{category:slug}', [CategoryController::class, 'index'])->name('category');

Route::get('authors/{author:userName}', [UserController::class, 'index']);
