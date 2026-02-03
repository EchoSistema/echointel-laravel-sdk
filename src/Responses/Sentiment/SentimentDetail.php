<?php

declare(strict_types=1);

namespace EchoIntel\Responses\Sentiment;

use EchoIntel\Responses\Common\EchoIntelResponse;

class SentimentDetail extends EchoIntelResponse
{
    public ?string $id;
    public string $sentiment;
    public string $emotion;
    public float $score;
    public array $keyTopics;
    public string $interpretation;

    protected function hydrate(array $data): void
    {
        $this->id = $data['id'] ?? null;
        $this->sentiment = $data['sentiment'] ?? '';
        $this->emotion = $data['emotion'] ?? '';
        $this->score = (float) ($data['score'] ?? 0);
        $this->keyTopics = $data['key_topics'] ?? [];
        $this->interpretation = $data['interpretation'] ?? '';
    }
}
