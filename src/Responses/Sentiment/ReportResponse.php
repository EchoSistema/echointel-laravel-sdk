<?php

declare(strict_types=1);

namespace EchoIntel\Responses\Sentiment;

use EchoIntel\Responses\Common\EchoIntelResponse;

class ReportResponse extends EchoIntelResponse
{
    public string $periodStart;
    public string $periodEnd;
    public SentimentKpiBlock $kpis;

    /** @var SentimentDetail[] */
    public array $details;

    public string $interpretation;

    protected function hydrate(array $data): void
    {
        $this->periodStart = $data['period_start'] ?? '';
        $this->periodEnd = $data['period_end'] ?? '';
        $this->interpretation = $data['interpretation'] ?? '';
        $this->kpis = SentimentKpiBlock::fromArray($data['kpis'] ?? []);

        $this->details = array_map(
            fn(array $item) => SentimentDetail::fromArray($item),
            $data['details'] ?? []
        );
    }
}
