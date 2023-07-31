<?php

namespace App\Http\Controllers;

use App\Services\MailchimpNewsletter;
use App\Services\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $mailchimpNewsletter)
    {
        request()->validate([
            'email' => 'required|email'
        ]);

        try {
            $mailchimpNewsletter->subscribe(request('email'));
        } catch (\Throwable $th) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'email' => 'This email invalid'
            ]);
        }

        return redirect('/')->with('success', 'Your are now singed up for our newsletter!');

        // $response = $mailchimp->ping->get();
        // $response = $mailchimp->lists->getAllLists();
        // $response = $mailchimp->lists->getList("c3fc342105");
        // $response = $mailchimp->lists->getListMembersInfo("c3fc342105");
        // add member
        // $response = $mailchimp->lists->addListMember("c3fc342105", [
        //     "email_address" => request('email'),
        //     "status" => "subscribed",
        // ]);


        // $response = $mailchimp->lists->updateListMemberTags("list_id", "subscriber_hash", [
        //     "tags" => [["name" => "name", "status" => "active"]],
        // ]);]


    }
}
