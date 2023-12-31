<?php

namespace App\Providers;

use App\Services\Newsletter;
use MailchimpMarketing\ApiClient;
use App\Services\MailchimpNewsletter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind(
            Newsletter::class,

            function () {
                $client = new ApiClient();
                $client->setConfig([
                    'apiKey' => config('services.mailchimp.apikey'),
                    'server' => 'us21'
                ]);

                return new MailchimpNewsletter($client);
            }

        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
