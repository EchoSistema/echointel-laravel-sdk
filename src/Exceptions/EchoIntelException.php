<?php

declare(strict_types=1);

namespace EchoIntel\Exceptions;

use Exception;
use Throwable;

class EchoIntelException extends Exception
{
    protected ?int $statusCode;
    protected array $context;

    public function __construct(
        string $message = '',
        ?int $statusCode = null,
        array $context = [],
        ?Throwable $previous = null
    ) {
        parent::__construct($message, 0, $previous);
        $this->statusCode = $statusCode;
        $this->context = $context;
    }

    public function getStatusCode(): ?int
    {
        return $this->statusCode;
    }

    public function getContext(): array
    {
        return $this->context;
    }
}
