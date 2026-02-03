<?php

declare(strict_types=1);

namespace EchoIntel\Responses\Forecast;

use EchoIntel\Responses\Common\EchoIntelResponse;

class ForecastAlgorithmResult extends EchoIntelResponse
{
    public string $productCode;
    public string $bestAlgorithm;
    public ForecastEvaluationMetrics $evaluationMetrics;
    public ForecastData $forecast;

    protected function hydrate(array $data): void
    {
        $this->productCode = $data['product_code'] ?? '';
        $this->bestAlgorithm = $data['best_algorithm'] ?? '';
        $this->evaluationMetrics = ForecastEvaluationMetrics::fromArray($data['evaluation_metrics'] ?? []);
        $this->forecast = ForecastData::fromArray($data['forecast'] ?? []);
    }
}
