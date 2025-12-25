<?php

declare(strict_types=1);

namespace EchoIntel\Responses\Customer;

use EchoIntel\Responses\Common\EchoIntelResponse;

class ClvForecastResponse extends EchoIntelResponse
{
    public string $bestAlgorithm;
    public int $horizonMonths;
    public array $evaluationMae;

    /** @var ClvForecastCustomer[] */
    public array $customers;

    protected function hydrate(array $data): void
    {
        $this->bestAlgorithm = $data['best_algorithm'] ?? '';
        $this->horizonMonths = (int) ($data['horizon_months'] ?? 0);
        $this->evaluationMae = $data['evaluation_mae'] ?? [];

        $this->customers = array_map(
            fn(array $item) => ClvForecastCustomer::fromArray($item),
            $data['customers'] ?? []
        );
    }
}
