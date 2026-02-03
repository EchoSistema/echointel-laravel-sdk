<?php

declare(strict_types=1);

namespace EchoIntel\Responses\Attribution;

use EchoIntel\Responses\Common\EchoIntelResponse;

class UpliftResponse extends EchoIntelResponse
{
    public float $averageTreatmentEffect;
    public float $treatmentCr;
    public float $controlCr;

    /** @var DecileSummary[] */
    public array $decileSummary;

    /** @var UpliftDetail[] */
    public array $details;

    public string $interpretation;

    protected function hydrate(array $data): void
    {
        $this->averageTreatmentEffect = (float) ($data['average_treatment_effect'] ?? 0);
        $this->treatmentCr = (float) ($data['treatment_cr'] ?? 0);
        $this->controlCr = (float) ($data['control_cr'] ?? 0);
        $this->interpretation = $data['interpretation'] ?? '';

        $this->decileSummary = array_map(
            fn(array $item) => DecileSummary::fromArray($item),
            $data['decile_summary'] ?? []
        );

        $this->details = array_map(
            fn(array $item) => UpliftDetail::fromArray($item),
            $data['details'] ?? []
        );
    }
}
