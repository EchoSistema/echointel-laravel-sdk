<?php

declare(strict_types=1);

namespace EchoIntel\Responses\CrossSell;

use EchoIntel\Responses\Common\EchoIntelResponse;

class UpsellResponse extends EchoIntelResponse
{
    /** @var UpsellPair[] */
    public array $suggestions;

    public string $metric;
    public string $generatedAt;

    protected function hydrate(array $data): void
    {
        $this->suggestions = array_map(
            fn(array $item) => UpsellPair::fromArray($item),
            $data['suggestions'] ?? []
        );

        $this->metric = $data['metric'] ?? '';
        $this->generatedAt = $data['generated_at'] ?? '';
    }
}
