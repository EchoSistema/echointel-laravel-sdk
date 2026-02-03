<?php

declare(strict_types=1);

namespace EchoIntel\Responses\Anomaly;

use EchoIntel\Responses\Common\EchoIntelResponse;

class TabularResponse extends EchoIntelResponse
{
    public AnomalyKpiBlock $kpi;

    /** @var AnomalyDetail[] */
    public array $details;

    public string $interpretation;

    protected function hydrate(array $data): void
    {
        $this->kpi = AnomalyKpiBlock::fromArray($data['kpi'] ?? []);
        $this->interpretation = $data['interpretation'] ?? '';

        $this->details = array_map(
            fn(array $item) => AnomalyDetail::fromArray($item),
            $data['details'] ?? []
        );
    }
}
