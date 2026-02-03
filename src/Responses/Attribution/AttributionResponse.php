<?php

declare(strict_types=1);

namespace EchoIntel\Responses\Attribution;

use EchoIntel\Responses\Common\EchoIntelResponse;

class AttributionResponse extends EchoIntelResponse
{
    /** @var ChannelContribution[] */
    public array $contributions;

    public ?float $globalAuc;
    public string $interpretation;

    protected function hydrate(array $data): void
    {
        $this->globalAuc = isset($data['global_auc']) ? (float) $data['global_auc'] : null;
        $this->interpretation = $data['interpretation'] ?? '';

        $this->contributions = array_map(
            fn(array $item) => ChannelContribution::fromArray($item),
            $data['contributions'] ?? []
        );
    }
}
