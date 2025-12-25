<?php

declare(strict_types=1);

namespace EchoIntel\Responses\Customer;

use EchoIntel\Responses\Common\EchoIntelResponse;

class CustomerScore extends EchoIntelResponse
{
    public string $customerId;
    public float $loyaltyScore;
    public string $segment;

    protected function hydrate(array $data): void
    {
        $this->customerId = $data['customer_id'] ?? '';
        $this->loyaltyScore = (float) ($data['loyalty_score'] ?? 0);
        $this->segment = $data['segment'] ?? '';
    }
}
