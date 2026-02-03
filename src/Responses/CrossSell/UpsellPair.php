<?php

declare(strict_types=1);

namespace EchoIntel\Responses\CrossSell;

use EchoIntel\Responses\Common\EchoIntelResponse;

class UpsellPair extends EchoIntelResponse
{
    public string $baseItem;
    public string $upsellItem;
    public float $probability;

    protected function hydrate(array $data): void
    {
        $this->baseItem = $data['base_item'] ?? '';
        $this->upsellItem = $data['upsell_item'] ?? '';
        $this->probability = (float) ($data['probability'] ?? 0);
    }
}
