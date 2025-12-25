<?php

declare(strict_types=1);

namespace EchoIntel\Responses\Customer;

use EchoIntel\Responses\Common\EchoIntelResponse;

class RfmResponse extends EchoIntelResponse
{
    /** @var RfmCustomerOut[] */
    public array $customers;

    public array $thresholds;

    protected function hydrate(array $data): void
    {
        $this->customers = array_map(
            fn(array $item) => RfmCustomerOut::fromArray($item),
            $data['customers'] ?? []
        );

        $this->thresholds = $data['thresholds'] ?? [];
    }
}
