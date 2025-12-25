<?php

declare(strict_types=1);

namespace EchoIntel\Responses\Customer;

use EchoIntel\Responses\Common\EchoIntelResponse;

class BuildFeaturesResponse extends EchoIntelResponse
{
    /** @var FeaturesObject[] */
    public array $customers;

    protected function hydrate(array $data): void
    {
        $this->customers = array_map(
            fn(array $item) => FeaturesObject::fromArray($item),
            $data['customers'] ?? []
        );
    }
}
