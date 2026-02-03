<?php

declare(strict_types=1);

namespace EchoIntel\Responses\Recommendation;

use EchoIntel\Responses\Common\EchoIntelResponse;

class ModelInfo extends EchoIntelResponse
{
    public string $algorithm;
    public string $metric;
    public float $value;
    public int $trainRows;

    protected function hydrate(array $data): void
    {
        $this->algorithm = $data['algorithm'] ?? '';
        $this->metric = $data['metric'] ?? '';
        $this->value = (float) ($data['value'] ?? 0);
        $this->trainRows = (int) ($data['train_rows'] ?? 0);
    }
}
