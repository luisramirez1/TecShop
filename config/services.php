<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => '1831243600483691',
        'client_secret' => '6137f994b4ea170588aeae39d8909b05',
        'redirect' => 'http://tecshopweb.tk/auth/facebook/callback',
    ],

    'twitter' => [
        'client_id' => 'B8WF5JV1hB2Q79OZ2rshv4Ge3',
        'client_secret' => 'Bc075Y9wJFvVsbwbI9emxArNEhpasjQRB49qTUkqefkQks34p6',
        'redirect' => 'http://tecshopweb.tk/auth/twitter/callback',
    ],

    'google' => [
        'client_id' => '514759440638-ht0io9ho7i6vt1uvsqqs6chtebp7hp50.apps.googleusercontent.com',
        'client_secret' => 'D64-B2G5r98J4WnREdovRsK2',
        'redirect' => 'http://tecshopweb.tk/auth/google/callback',
    ],


];
