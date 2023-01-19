<?php

namespace App\Http\Controllers;

use App\services\Newsletter;
use Illuminate\Validation\ValidationException;
use Exception;

class NewsletterController extends Controller
{
  public function __invoke(Newsletter $newsletter)
  {
    request()->validate([
      'email' => ['required', 'email']
    ]);

    try {
      $newsletter->subscribe(request('email'));
    } catch (Exception $e) {
      throw ValidationException::withMessages([
        'email' => 'This email could not be added to our newsletter list'
      ]);
    }

    return redirect('/')
      ->with('sucess', 'You are now signed up for our newsletter!');
  }
}
