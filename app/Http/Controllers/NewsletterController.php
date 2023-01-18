<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{

  protected function getClient()
  {
    $mailchimp = new \MailchimpMarketing\ApiClient();

    return $mailchimp->setConfig([
      'apiKey' => config('services.mailchimp.key'),
      'server' => 'us18'
    ]);
  }

  public function subscribe(Request $request)
  {
    $request->validate([
      'email' => ['required', 'email']
    ]);

    try {
      $this->getClient()->lists->addListMember(config('services.mailchimp.master_list_key'), [
        'email_address' => $request->input('email'),
        'status' => 'subscribed'
      ]);
    } catch (Exception $e) {
      throw ValidationException::withMessages([
        'email' => 'This email could not be added to our newsletter list'
      ]);
    }

    return redirect('/')
      ->with('sucess', 'You are now signed up for our newsletter!');
  }
}
