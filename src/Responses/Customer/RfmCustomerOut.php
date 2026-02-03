<?php

declare(strict_types=1);

namespace EchoIntel\Responses\Customer;

use EchoIntel\Responses\Common\EchoIntelResponse;

class RfmCustomerOut extends EchoIntelResponse
{
    public string $customerId;
    public int $recencyDays;
    public int $frequency;
    public float $monetaryTotal;
    public int $recencyScore;
    public int $frequencyScore;
    public int $monetaryScore;
    public string $rfmClass;
    public int $rfmTotal;
    public string $rfmTier;
    public string $interpretation;

    protected function hydrate(array $data): void
    {
        $this->customerId = $data['customer_id'] ?? '';
        $this->recencyDays = (int) ($data['recency_days'] ?? 0);
        $this->frequency = (int) ($data['frequency'] ?? 0);
        $this->monetaryTotal = (float) ($data['monetary_total'] ?? 0);
        $this->recencyScore = (int) ($data['recency_score'] ?? 0);
        $this->frequencyScore = (int) ($data['frequency_score'] ?? 0);
        $this->monetaryScore = (int) ($data['monetary_score'] ?? 0);
        $this->rfmClass = $data['rfm_class'] ?? '';
        $this->rfmTotal = (int) ($data['rfm_total'] ?? 0);
        $this->rfmTier = $data['rfm_tier'] ?? '';
        $this->interpretation = $data['interpretation'] ?? '';
    }
}
