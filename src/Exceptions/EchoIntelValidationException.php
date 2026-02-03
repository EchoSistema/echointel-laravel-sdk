<?php

declare(strict_types=1);

namespace EchoIntel\Exceptions;

use Throwable;

class EchoIntelValidationException extends EchoIntelException
{
    protected array $errors;

    public function __construct(
        string $message = 'Validation failed',
        array $errors = [],
        ?Throwable $previous = null
    ) {
        parent::__construct($message, 422, ['errors' => $errors], $previous);
        $this->errors = $errors;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}
