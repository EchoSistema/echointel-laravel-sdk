<?php

declare(strict_types=1);

namespace EchoIntel\Responses\CrossSell;

use EchoIntel\Responses\Common\EchoIntelResponse;

class CrossSellResponse extends EchoIntelResponse
{
    public array $itemsOrCategories;
    public array $matrix;
    public string $metric;
    public string $generatedAt;

    protected function hydrate(array $data): void
    {
        $this->itemsOrCategories = $data['items_or_categories'] ?? [];
        $this->matrix = $data['matrix'] ?? [];
        $this->metric = $data['metric'] ?? '';
        $this->generatedAt = $data['generated_at'] ?? '';
    }
}
