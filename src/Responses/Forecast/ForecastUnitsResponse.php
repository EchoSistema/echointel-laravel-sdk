<?php

declare(strict_types=1);

namespace EchoIntel\Responses\Forecast;

use EchoIntel\Responses\Common\EchoIntelResponse;

class ForecastUnitsResponse extends EchoIntelResponse
{
    public int $forecastPeriod;

    /** @var ForecastAlgorithmResult[] */
    public array $forecasts;

    public float $executionTimeSeconds;

    protected function hydrate(array $data): void
    {
        $this->forecastPeriod = (int) ($data['forecast_period'] ?? 0);
        $this->executionTimeSeconds = (float) ($data['execution_time_seconds'] ?? 0);

        $this->forecasts = array_map(
            fn(array $item) => ForecastAlgorithmResult::fromArray($item),
            $data['forecasts'] ?? []
        );
    }
}
