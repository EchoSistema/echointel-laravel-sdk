<?php

declare(strict_types=1);

namespace EchoIntel\Responses\Anomaly;

use EchoIntel\Responses\Common\EchoIntelResponse;

class AnomalyKpiBlock extends EchoIntelResponse
{
    public float $detectedPct;
    public ?float $auc;

    protected function hydrate(array $data): void
    {
        $this->detectedPct = (float) ($data['detected_pct'] ?? 0);
        $this->auc = isset($data['auc']) ? (float) $data['auc'] : null;
    }
}
