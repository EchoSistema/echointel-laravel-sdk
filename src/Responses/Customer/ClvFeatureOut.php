<?php

declare(strict_types=1);

namespace EchoIntel\Responses\Customer;

use EchoIntel\Responses\Common\EchoIntelResponse;

class ClvFeatureOut extends EchoIntelResponse
{
    public string $customerId;
    public int $frequency;
    public float $recency;
    public float $t;
    public float $monetaryValue;
    public bool $churned;
    public string $clvPotentialTier;
    public string $interpretation;
    public array $explanations;

    protected function hydrate(array $data): void
    {
        $this->customerId = $data['customer_id'] ?? '';
        $this->frequency = (int) ($data['frequency'] ?? 0);
        $this->recency = (float) ($data['recency'] ?? 0);
        $this->t = (float) ($data['T'] ?? 0);
        $this->monetaryValue = (float) ($data['monetary_value'] ?? 0);
        $this->churned = (bool) ($data['churned'] ?? false);
        $this->clvPotentialTier = $data['clv_potential_tier'] ?? '';
        $this->interpretation = $data['interpretation'] ?? '';
        $this->explanations = $data['explanations'] ?? [];
    }
}
