<?php

declare(strict_types=1);

namespace EchoIntel\Responses\Sentiment;

use EchoIntel\Responses\Common\EchoIntelResponse;

class RealtimeResponse extends EchoIntelResponse
{
    public SentimentDetail $analysis;
    public string $interpretation;

    protected function hydrate(array $data): void
    {
        $this->analysis = SentimentDetail::fromArray($data['analysis'] ?? []);
        $this->interpretation = $data['interpretation'] ?? '';
    }
}
