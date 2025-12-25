<?php

declare(strict_types=1);

namespace EchoIntel\Responses\Attribution;

use EchoIntel\Responses\Common\EchoIntelResponse;

class ChannelContribution extends EchoIntelResponse
{
    public string $channel;
    public int $nEvents;
    public float $rawCr;
    public float $incrementalLift;
    public string $description;

    protected function hydrate(array $data): void
    {
        $this->channel = $data['channel'] ?? '';
        $this->nEvents = (int) ($data['n_events'] ?? 0);
        $this->rawCr = (float) ($data['raw_cr'] ?? 0);
        $this->incrementalLift = (float) ($data['incremental_lift'] ?? 0);
        $this->description = $data['description'] ?? '';
    }
}
