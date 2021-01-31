<?php

return [
    'mailers' => [
        'mailjet' => [
            'private_key' => env('MAILJET_PRIVATE_KEY'),
            'public_key' => env('MAILJET_PUBLIC_KEY'),
        ],
        'sendgrid' => [
            'api_key' => env('SENDGRID_KEY'),
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Global "From" Address
    |--------------------------------------------------------------------------
    |
    | You may wish for all e-mails sent by your application to be sent from
    | the same address. Here, you may specify a name and address that is
    | used globally for all e-mails that are sent by your application.
    |
    */

    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
        'name' => env('MAIL_FROM_NAME', 'Example'),
    ],
];
