<?php

declare(strict_types=1);

namespace EchoIntel\Responses\Common;

use ArrayAccess;
use JsonSerializable;

abstract class EchoIntelResponse implements ArrayAccess, JsonSerializable
{
    protected array $data;

    public function __construct(array $data = [])
    {
        $this->data = $data;
        $this->hydrate($data);
    }

    abstract protected function hydrate(array $data): void;

    public function toArray(): array
    {
        return $this->data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->data[$offset]);
    }

    public function offsetGet(mixed $offset): mixed
    {
        return $this->data[$offset] ?? null;
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        $this->data[$offset] = $value;
    }

    public function offsetUnset(mixed $offset): void
    {
        unset($this->data[$offset]);
    }

    public static function fromArray(array $data): static
    {
        return new static($data);
    }
}
