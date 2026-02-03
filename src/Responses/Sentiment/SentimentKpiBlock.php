<?php

declare(strict_types=1);

namespace EchoIntel\Responses\Sentiment;

use EchoIntel\Responses\Common\EchoIntelResponse;

class SentimentKpiBlock extends EchoIntelResponse
{
    public float $positivePct;
    public float $neutralPct;
    public float $negativePct;
    public array $topTopics;

    protected function hydrate(array $data): void
    {
        $this->positivePct = (float) ($data['positive_pct'] ?? 0);
        $this->neutralPct = (float) ($data['neutral_pct'] ?? 0);
        $this->negativePct = (float) ($data['negative_pct'] ?? 0);
        $this->topTopics = $data['top_topics'] ?? [];
    }
}
