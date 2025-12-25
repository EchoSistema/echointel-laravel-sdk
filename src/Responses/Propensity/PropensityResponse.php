<?php

declare(strict_types=1);

namespace EchoIntel\Responses\Propensity;

use EchoIntel\Responses\Common\EchoIntelResponse;

class PropensityResponse extends EchoIntelResponse
{
    public array $predictions;
    public array $modelInfo;

    protected function hydrate(array $data): void
    {
        $this->predictions = $data['predictions'] ?? [];
        $this->modelInfo = $data['model_info'] ?? [];
    }
}
