<?php

declare(strict_types=1);

namespace EchoIntel\Responses\CreditRisk;

use EchoIntel\Responses\Common\EchoIntelResponse;

class Prediction extends EchoIntelResponse
{
    public string $id;
    public float $probability;
    public ?array $shapValues;
    public ?string $shapInterpretation;

    protected function hydrate(array $data): void
    {
        $this->id = $data['id'] ?? '';
        $this->probability = (float) ($data['probability'] ?? 0);
        $this->shapValues = $data['shap_values'] ?? null;
        $this->shapInterpretation = $data['shap_interpretation'] ?? null;
    }
}
