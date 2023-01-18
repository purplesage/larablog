<?php

class Newsletter
{

  private static $masterListKey = "317737b965";

  public function subscribe(string $email)
  {
    $mailchimp = new MailchimpMarketing\ApiClient();

    $mailchimp->setConfig([
      'apiKey' => config('services.mailchimp.key'),
      'server' => 'us18'
    ]);

    return $mailchimp->lists->addListMember(static::$masterListKey, [
      'email_address' => $email,
      'status' => 'subscribed'
    ]);
  }
}

Route::post('newsletter', function () {

  request()->validate([
    'email' => ['required', 'email']
  ]);

  $newsletter = new Newsletter();
  $newsletter->subscribe(request('email'));

  try {
    $newsletter = new Newsletter();
    $newsletter->subscribe(request('email'));
  } catch (Exception $e) {
    throw \Illuminate\Validation\ValidationException::withMessages([
      'email' => 'This email could not be added to our newsletter list'
    ]);
  }

  return redirect('/')
    ->with('sucess', 'You are now signed up for our newsletter!');
});
