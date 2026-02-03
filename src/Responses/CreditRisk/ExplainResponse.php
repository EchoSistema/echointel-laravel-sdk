<?php

declare(strict_types=1);

namespace EchoIntel\Responses\CreditRisk;

use EchoIntel\Responses\Common\EchoIntelResponse;

class ExplainResponse extends EchoIntelResponse
{
    public float $probability;
    public array $explanation;
    public string $interpretation;

    protected function hydrate(array $data): void
    {
        $this->probability = (float) ($data['probability'] ?? 0);
        $this->explanation = $data['explanation'] ?? [];
        $this->interpretation = $data['interpretation'] ?? '';
    }
}
