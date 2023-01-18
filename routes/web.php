<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\CommentController;

Route::get('ping', function () {
  $mailchimp = new \MailchimpMarketing\ApiClient();

  $mailchimp->setConfig([
    'apiKey' => config('services.mailchimp.key'),
    'server' => 'us18'
  ]);

  $response = $mailchimp->lists->addListMember("317737b965", [
    'email_address' => 'danielmendoza1200@gmail.com',
    'status' => 'subscribed'
  ]);
  ddd($response);
});

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('post/{post:slug}', [PostController::class, 'show']);

Route::middleware(['guest'])->group(function () {
  Route::get('register', [RegisterController::class, 'create']);
  Route::post('register', [RegisterController::class, 'store']);
  Route::get('login', [SessionsController::class, 'create']);
  Route::post('login', [SessionsController::class, 'store']);
});

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');
Route::post('posts/{post:slug}/comment', [CommentController::class, 'store'])->middleware('auth');
