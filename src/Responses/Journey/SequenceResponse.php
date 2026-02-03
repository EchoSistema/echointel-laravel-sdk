<?php

declare(strict_types=1);

namespace EchoIntel\Responses\Journey;

use EchoIntel\Responses\Common\EchoIntelResponse;

class SequenceResponse extends EchoIntelResponse
{
    /** @var Path[] */
    public array $frequentPaths;

    public string $interpretation;

    protected function hydrate(array $data): void
    {
        $this->interpretation = $data['interpretation'] ?? '';

        $this->frequentPaths = array_map(
            fn(array $item) => Path::fromArray($item),
            $data['frequent_paths'] ?? []
        );
    }
}
