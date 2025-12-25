<?php

declare(strict_types=1);

namespace EchoIntel\Responses\Attribution;

use EchoIntel\Responses\Common\EchoIntelResponse;

class UpliftDetail extends EchoIntelResponse
{
    public string $id;
    public float $upliftScore;
    public int $upliftDecile;

    protected function hydrate(array $data): void
    {
        $this->id = $data['id'] ?? '';
        $this->upliftScore = (float) ($data['uplift_score'] ?? 0);
        $this->upliftDecile = (int) ($data['uplift_decile'] ?? 0);
    }
}
