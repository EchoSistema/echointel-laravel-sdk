<?php

declare(strict_types=1);

namespace EchoIntel\Responses\Recommendation;

use EchoIntel\Responses\Common\EchoIntelResponse;

class RecommendationOut extends EchoIntelResponse
{
    public string $itemId;
    public float $score;
    public string $source;
    public string $explanation;

    protected function hydrate(array $data): void
    {
        $this->itemId = $data['item_id'] ?? '';
        $this->score = (float) ($data['score'] ?? 0);
        $this->source = $data['source'] ?? '';
        $this->explanation = $data['explanation'] ?? '';
    }
}
