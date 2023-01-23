<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;
use App\services\Newsletter;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   *
   * @return void
   */
  public function register()
  {
    app()->bind(Newsletter::class, function () {
      $client = new \MailchimpMarketing\ApiClient();
      $client->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us18'
      ]);

      return new Newsletter($client);
    });
  }

  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot()
  {
    Gate::define('admin', function (User $user) {
      return $user->username == 'cygnusrift';
    });
  }
}
