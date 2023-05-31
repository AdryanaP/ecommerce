<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'me' => [
        'api' => env('WEBSITE_API_ENDPOINT'),
    ],

    'bling' => [
        'key' => env('BLING_ACCESS_KEY_ID'),
    ],

    'ipag' => [
        'username' => env('IPAG_USERNAME'),
        'password' => env('IPAG_PASSWORD'),
        'endpoint' => env('IPAG_ENDPOINT'),
        'callback_pix' => 'https://novo.justbeauty.com.br/api/callback/pix',
        'callback_boleto' => 'https://novo.justbeauty.com.br/api/callback/boleto',
    ],

];