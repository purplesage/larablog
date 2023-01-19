<?php

namespace App\services;


use MailchimpMarketing\ApiClient;

class Newsletter
{
  public function __construct(protected ApiClient $client,)
  {
  }

  public function subscribe(string $email)
  {
    return $this->client->lists->addListMember(config('services.mailchimp.master_list_key'), [
      'email_address' => $email,
      'status' => 'subscribed'
    ]);
  }
}
