<?php

declare(strict_types=1);

namespace EchoIntel\Responses\Forecast;

use EchoIntel\Responses\Common\EchoIntelResponse;

class ForecastValue extends EchoIntelResponse
{
    public string $yearMonth;
    public float $value;

    protected function hydrate(array $data): void
    {
        $this->yearMonth = $data['yyyy-mm'] ?? '';
        $this->value = (float) ($data['value'] ?? 0);
    }
}
