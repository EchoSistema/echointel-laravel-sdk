<?php

declare(strict_types=1);

namespace EchoIntel\Responses\CreditRisk;

use EchoIntel\Responses\Common\EchoIntelResponse;

class ScoreResponse extends EchoIntelResponse
{
    public float $auc;
    public string $bestModel;

    /** @var Prediction[] */
    public array $predictions;

    public string $interpretation;

    protected function hydrate(array $data): void
    {
        $this->auc = (float) ($data['auc'] ?? 0);
        $this->bestModel = $data['best_model'] ?? '';
        $this->interpretation = $data['interpretation'] ?? '';

        $this->predictions = array_map(
            fn(array $item) => Prediction::fromArray($item),
            $data['predictions'] ?? []
        );
    }
}
