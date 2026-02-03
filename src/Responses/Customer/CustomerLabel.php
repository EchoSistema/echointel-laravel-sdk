<?php

declare(strict_types=1);

namespace EchoIntel\Responses\Customer;

use EchoIntel\Responses\Common\EchoIntelResponse;

class CustomerLabel extends EchoIntelResponse
{
    public string $customerId;
    public int $clusterId;

    protected function hydrate(array $data): void
    {
        $this->customerId = $data['customer_id'] ?? '';
        $this->clusterId = (int) ($data['cluster_id'] ?? 0);
    }
}
