<?php

declare(strict_types=1);

namespace EchoIntel\Responses\Anomaly;

use EchoIntel\Responses\Common\EchoIntelResponse;

class AnomalyDetail extends EchoIntelResponse
{
    public string $id;
    public float $anomalyScore;
    public bool $fraudFlag;

    protected function hydrate(array $data): void
    {
        $this->id = $data['id'] ?? '';
        $this->anomalyScore = (float) ($data['anomaly_score'] ?? 0);
        $this->fraudFlag = (bool) ($data['fraud_flag'] ?? false);
    }
}
