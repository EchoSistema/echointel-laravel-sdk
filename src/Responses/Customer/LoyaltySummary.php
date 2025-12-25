<?php

declare(strict_types=1);

namespace EchoIntel\Responses\Customer;

use EchoIntel\Responses\Common\EchoIntelResponse;

class LoyaltySummary extends EchoIntelResponse
{
    public float $meanScore;
    public float $medianScore;
    public float $topDecileThreshold;
    public array $segmentCounts;

    protected function hydrate(array $data): void
    {
        $this->meanScore = (float) ($data['mean_score'] ?? 0);
        $this->medianScore = (float) ($data['median_score'] ?? 0);
        $this->topDecileThreshold = (float) ($data['top_decile_threshold'] ?? 0);
        $this->segmentCounts = $data['segment_counts'] ?? [];
    }
}
