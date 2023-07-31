<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;
use Illuminate\Support\Facades\Request;

class MailchimpNewsletter implements Newsletter
{

    protected $client;

    public function __construct(ApiClient $client)
    {
        $this->client = $client;
    }

    public function subscribe(string $email, string $list = NULL)
    {
        $list = isset($list) ? $list : config('services.mailchimp.lists.subscribers');

        return $this->client->lists->addListMember($list, [
            "email_address" => request('email'),
            "status" => "subscribed",
        ]);
    }
}
