<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'mandrill' => [
        'secret' => env('MANDRILL_SECRET'),
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
        'model' => Reactor\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => '1182087955211459',
        'client_secret' => 'ad9117700653b59afee28f89a5834600',
        'redirect' => 'http://localhost:8000/social/login/facebook',
    ],

    'google' => [
        'client_id' => '985665939050-6pt5l9sgcpoa9cumlb9ebie0h47ri47l.apps.googleusercontent.com',
        'client_secret' => 'Lx1uFJIksolffk74bIB0bvFz',
        'redirect' => 'http://localhost:8000/social/login/google',
    ],

];
