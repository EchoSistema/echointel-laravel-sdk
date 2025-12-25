<?php

declare(strict_types=1);

namespace EchoIntel\Responses\Inventory;

use EchoIntel\Responses\Common\EchoIntelResponse;

class ProcessingInfo extends EchoIntelResponse
{
    public float $processingTimeSeconds;
    public string $calculationDate;

    protected function hydrate(array $data): void
    {
        $this->processingTimeSeconds = (float) ($data['processing_time_seconds'] ?? 0);
        $this->calculationDate = $data['calculation_date'] ?? '';
    }
}
