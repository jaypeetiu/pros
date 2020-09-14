<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, SparkPost and others. This file provides a sane default
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'stripe' => [
        'model'  => App\User::class,
        'key' => env('pk_test_51HQcpMKq0UQmfTnQ7ovfvJgbjLy0ktqLKeZM2kHltNUOYFvL9RyKnCeiGFxWHl0sxAqHkkclHbqDSkVyUp8jpvqB00fs3ELepI'),
        'secret' => env('sk_test_51HQcpMKq0UQmfTnQNMxFuHDBuWJQWa8swHPECPuBB37FvcGOW6iV7bNPcHKdPBJ1HbI7EFRihKncFV5SWHxLNlLi00fXeBCMiS'),
    ],

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

];
