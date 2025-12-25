<?php

declare(strict_types=1);

return [
    /*
    |--------------------------------------------------------------------------
    | EchoIntel API URL
    |--------------------------------------------------------------------------
    |
    | The base URL for the EchoIntel AI API.
    |
    */
    'api_url' => env('ECHOINTEL_API_URL', 'https://ai.echosistema.live'),

    /*
    |--------------------------------------------------------------------------
    | Customer API ID
    |--------------------------------------------------------------------------
    |
    | Your unique customer API identifier provided by EchoIntel.
    |
    */
    'customer_api_id' => env('ECHOINTEL_CUSTOMER_API_ID'),

    /*
    |--------------------------------------------------------------------------
    | API Secret
    |--------------------------------------------------------------------------
    |
    | Your API secret key for authentication.
    |
    */
    'secret' => env('ECHOINTEL_SECRET'),

    /*
    |--------------------------------------------------------------------------
    | Admin Secret
    |--------------------------------------------------------------------------
    |
    | Admin secret for accessing administrative endpoints.
    | Only required if you need to use admin operations.
    |
    */
    'admin_secret' => env('ECHOINTEL_ADMIN_SECRET'),

    /*
    |--------------------------------------------------------------------------
    | Request Timeout
    |--------------------------------------------------------------------------
    |
    | The timeout in seconds for API requests.
    |
    */
    'timeout' => env('ECHOINTEL_TIMEOUT', 30),

    /*
    |--------------------------------------------------------------------------
    | Retry Configuration
    |--------------------------------------------------------------------------
    |
    | Configuration for automatic request retries on failure.
    |
    */
    'retry' => [
        'attempts' => 3,
        'delay' => 100, // milliseconds
    ],
];
