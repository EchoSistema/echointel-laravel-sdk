<?php

declare(strict_types=1);

return [
    /*
    |--------------------------------------------------------------------------
    | Sandbox Mode
    |--------------------------------------------------------------------------
    |
    | When enabled, all API requests will be sent to the sandbox environment
    | instead of production. Set ECHOINTEL_SANDBOX=true in your .env file
    | to activate sandbox mode. Defaults to true (sandbox).
    | Set ECHOINTEL_SANDBOX=false to use production.
    |
    */
    'sandbox' => filter_var(env('ECHOINTEL_SANDBOX', true), FILTER_VALIDATE_BOOLEAN),

    /*
    |--------------------------------------------------------------------------
    | EchoIntel API URL (Production)
    |--------------------------------------------------------------------------
    |
    | The base URL for the EchoIntel AI API in production.
    |
    */
    'api_url' => env('ECHOINTEL_API_URL', 'https://ai.echosistema.live'),

    /*
    |--------------------------------------------------------------------------
    | EchoIntel Sandbox API URL
    |--------------------------------------------------------------------------
    |
    | The base URL for the EchoIntel AI API in sandbox/development mode.
    |
    */
    'sandbox_api_url' => env('ECHOINTEL_SANDBOX_API_URL', 'https://ai.echosistema.dev'),

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
