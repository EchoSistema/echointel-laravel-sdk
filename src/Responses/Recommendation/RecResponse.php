<?php

declare(strict_types=1);

namespace EchoIntel\Responses\Recommendation;

use EchoIntel\Responses\Common\EchoIntelResponse;

class RecResponse extends EchoIntelResponse
{
    /** @var RecommendationOut[] */
    public array $recommendations;

    public ModelInfo $modelInfo;

    protected function hydrate(array $data): void
    {
        $this->recommendations = array_map(
            fn(array $item) => RecommendationOut::fromArray($item),
            $data['recommendations'] ?? []
        );

        $this->modelInfo = ModelInfo::fromArray($data['model_info'] ?? []);
    }
}
