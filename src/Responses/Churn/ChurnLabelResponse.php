<?php

declare(strict_types=1);

namespace EchoIntel\Responses\Churn;

use EchoIntel\Responses\Common\EchoIntelResponse;

class ChurnLabelResponse extends EchoIntelResponse
{
    public string $customerId;
    public string $snapshotDate;
    public int $churned;

    protected function hydrate(array $data): void
    {
        $this->customerId = $data['customer_id'] ?? '';
        $this->snapshotDate = $data['snapshot_date'] ?? '';
        $this->churned = (int) ($data['churned'] ?? 0);
    }
}
