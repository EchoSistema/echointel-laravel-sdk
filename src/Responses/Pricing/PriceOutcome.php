<?php

declare(strict_types=1);

namespace EchoIntel\Responses\Pricing;

use EchoIntel\Responses\Common\EchoIntelResponse;

class PriceOutcome extends EchoIntelResponse
{
    public float $candidatePrice;
    public float $expectedUnits;
    public float $expectedRevenue;
    public float $expectedProfit;

    protected function hydrate(array $data): void
    {
        $this->candidatePrice = (float) ($data['candidate_price'] ?? 0);
        $this->expectedUnits = (float) ($data['expected_units'] ?? 0);
        $this->expectedRevenue = (float) ($data['expected_revenue'] ?? 0);
        $this->expectedProfit = (float) ($data['expected_profit'] ?? 0);
    }
}
