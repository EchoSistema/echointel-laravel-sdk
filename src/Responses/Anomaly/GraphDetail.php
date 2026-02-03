<?php

declare(strict_types=1);

namespace EchoIntel\Responses\Anomaly;

use EchoIntel\Responses\Common\EchoIntelResponse;

class GraphDetail extends EchoIntelResponse
{
    public string $node;
    public float $anomalyScore;
    public bool $flag;

    protected function hydrate(array $data): void
    {
        $this->node = $data['node'] ?? '';
        $this->anomalyScore = (float) ($data['anomaly_score'] ?? 0);
        $this->flag = (bool) ($data['flag'] ?? false);
    }
}
