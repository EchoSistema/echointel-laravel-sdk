<?php

declare(strict_types=1);

namespace EchoIntel\Responses\Journey;

use EchoIntel\Responses\Common\EchoIntelResponse;

class Transition extends EchoIntelResponse
{
    public string $fromStep;
    public string $toStep;
    public float $probability;

    protected function hydrate(array $data): void
    {
        $this->fromStep = $data['from_step'] ?? '';
        $this->toStep = $data['to_step'] ?? '';
        $this->probability = (float) ($data['probability'] ?? 0);
    }
}
