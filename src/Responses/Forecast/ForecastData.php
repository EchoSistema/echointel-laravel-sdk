<?php

declare(strict_types=1);

namespace EchoIntel\Responses\Forecast;

use EchoIntel\Responses\Common\EchoIntelResponse;

class ForecastData extends EchoIntelResponse
{
    /** @var ForecastValue[] */
    public array $calendar;

    /** @var ForecastValue[] */
    public array $business;

    protected function hydrate(array $data): void
    {
        $this->calendar = array_map(
            fn(array $item) => ForecastValue::fromArray($item),
            $data['calendar'] ?? []
        );

        $this->business = array_map(
            fn(array $item) => ForecastValue::fromArray($item),
            $data['business'] ?? []
        );
    }
}
