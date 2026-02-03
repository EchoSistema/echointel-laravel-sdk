<?php

declare(strict_types=1);

namespace EchoIntel\Responses\Journey;

use EchoIntel\Responses\Common\EchoIntelResponse;

class Path extends EchoIntelResponse
{
    public array $path;
    public int $support;

    protected function hydrate(array $data): void
    {
        $this->path = $data['path'] ?? [];
        $this->support = (int) ($data['support'] ?? 0);
    }
}
