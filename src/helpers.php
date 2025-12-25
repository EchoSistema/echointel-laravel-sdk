<?php

declare(strict_types=1);

use EchoIntel\EchoIntelClient;

if (!function_exists('echointel')) {
    /**
     * Get the EchoIntel client instance.
     */
    function echointel(): EchoIntelClient
    {
        return app('echointel');
    }
}
