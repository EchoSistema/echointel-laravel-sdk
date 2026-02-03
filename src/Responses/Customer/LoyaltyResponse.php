<?php

declare(strict_types=1);

namespace EchoIntel\Responses\Customer;

use EchoIntel\Responses\Common\EchoIntelResponse;

class LoyaltyResponse extends EchoIntelResponse
{
    /** @var CustomerScore[] */
    public array $customers;

    public LoyaltySummary $summary;

    protected function hydrate(array $data): void
    {
        $this->customers = array_map(
            fn(array $item) => CustomerScore::fromArray($item),
            $data['customers'] ?? []
        );

        $this->summary = LoyaltySummary::fromArray($data['summary'] ?? []);
    }
}
