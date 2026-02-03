<?php

declare(strict_types=1);

namespace EchoIntel\Responses\Pricing;

use EchoIntel\Responses\Common\EchoIntelResponse;

class PricingResponse extends EchoIntelResponse
{
    public float $bestPrice;

    /** @var PriceOutcome[] */
    public array $outcomes;

    public array $modelInfo;
    public string $interpretation;

    protected function hydrate(array $data): void
    {
        $this->bestPrice = (float) ($data['best_price'] ?? 0);
        $this->interpretation = $data['interpretation'] ?? '';
        $this->modelInfo = $data['model_info'] ?? [];

        $this->outcomes = array_map(
            fn(array $item) => PriceOutcome::fromArray($item),
            $data['outcomes'] ?? []
        );
    }
}
