<?php

declare(strict_types=1);

namespace EchoIntel\Exceptions;

use Throwable;

class EchoIntelAuthenticationException extends EchoIntelException
{
    public function __construct(
        string $message = 'Authentication failed',
        ?int $statusCode = 401,
        ?Throwable $previous = null
    ) {
        parent::__construct($message, $statusCode, [], $previous);
    }
}
