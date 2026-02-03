<?php

declare(strict_types=1);

namespace EchoIntel\Responses\Customer;

use EchoIntel\Responses\Common\EchoIntelResponse;

class ClvForecastCustomer extends EchoIntelResponse
{
    public string $customerId;
    public float $predictedClv;
    public ?float $predictedTxns;
    public ?float $predictedAvgMargin;
    public string $algorithmUsed;
    public string $clvTier;
    public string $interpretation;
    public array $explanations;

    protected function hydrate(array $data): void
    {
        $this->customerId = $data['customer_id'] ?? '';
        $this->predictedClv = (float) ($data['predicted_clv'] ?? 0);
        $this->predictedTxns = isset($data['predicted_txns']) ? (float) $data['predicted_txns'] : null;
        $this->predictedAvgMargin = isset($data['predicted_avg_margin']) ? (float) $data['predicted_avg_margin'] : null;
        $this->algorithmUsed = $data['algorithm_used'] ?? '';
        $this->clvTier = $data['clv_tier'] ?? '';
        $this->interpretation = $data['interpretation'] ?? '';
        $this->explanations = $data['explanations'] ?? [];
    }
}
