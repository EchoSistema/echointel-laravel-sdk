<?php

declare(strict_types=1);

namespace EchoIntel\Responses\Forecast;

use EchoIntel\Responses\Common\EchoIntelResponse;

class ForecastEvaluationMetrics extends EchoIntelResponse
{
    public ?float $rmse;
    public ?float $mae;
    public ?float $r2;
    public ?float $averageDailySales;
    public string $interpretation;

    protected function hydrate(array $data): void
    {
        $this->rmse = isset($data['RMSE']) ? (float) $data['RMSE'] : null;
        $this->mae = isset($data['MAE']) ? (float) $data['MAE'] : null;
        $this->r2 = isset($data['R2']) ? (float) $data['R2'] : null;
        $this->averageDailySales = isset($data['average_daily_sales']) ? (float) $data['average_daily_sales'] : null;
        $this->interpretation = $data['Interpretation'] ?? '';
    }
}
