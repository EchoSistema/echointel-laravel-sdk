<?php

declare(strict_types=1);

namespace EchoIntel\Responses\Customer;

use EchoIntel\Responses\Common\EchoIntelResponse;

class ClvFeaturesResponse extends EchoIntelResponse
{
    /** @var ClvFeatureOut[] */
    public array $customers;

    protected function hydrate(array $data): void
    {
        $this->customers = array_map(
            fn(array $item) => ClvFeatureOut::fromArray($item),
            $data['customers'] ?? []
        );
    }
}
