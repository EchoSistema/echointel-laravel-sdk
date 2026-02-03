<?php

declare(strict_types=1);

namespace EchoIntel\Responses\Attribution;

use EchoIntel\Responses\Common\EchoIntelResponse;

class DecileSummary extends EchoIntelResponse
{
    public int $decile;
    public float $meanUplift;
    public int $nCustomers;

    protected function hydrate(array $data): void
    {
        $this->decile = (int) ($data['decile'] ?? 0);
        $this->meanUplift = (float) ($data['mean_uplift'] ?? 0);
        $this->nCustomers = (int) ($data['n_customers'] ?? 0);
    }
}
