<?php

declare(strict_types=1);

namespace EchoIntel\Responses\Customer;

use EchoIntel\Responses\Common\EchoIntelResponse;

class FeaturesObject extends EchoIntelResponse
{
    public string $customerId;
    public array $features;

    protected function hydrate(array $data): void
    {
        $this->customerId = $data['customer_id'] ?? '';
        $this->features = $data['features'] ?? [];
    }
}
