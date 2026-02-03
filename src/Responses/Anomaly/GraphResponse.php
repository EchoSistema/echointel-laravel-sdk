<?php

declare(strict_types=1);

namespace EchoIntel\Responses\Anomaly;

use EchoIntel\Responses\Common\EchoIntelResponse;

class GraphResponse extends EchoIntelResponse
{
    /** @var GraphDetail[] */
    public array $details;

    public string $interpretation;

    protected function hydrate(array $data): void
    {
        $this->interpretation = $data['interpretation'] ?? '';

        $this->details = array_map(
            fn(array $item) => GraphDetail::fromArray($item),
            $data['details'] ?? []
        );
    }
}
