<?php

declare(strict_types=1);

namespace EchoIntel\Responses\Customer;

use EchoIntel\Responses\Common\EchoIntelResponse;

class SegmentationResponse extends EchoIntelResponse
{
    public string $bestAlgorithm;

    /** @var AlgorithmMetrics[] */
    public array $evaluationMetrics;

    /** @var ClusterDetail[] */
    public array $clusters;

    /** @var CustomerLabel[] */
    public array $customerLabels;

    protected function hydrate(array $data): void
    {
        $this->bestAlgorithm = $data['best_algorithm'] ?? '';

        $this->evaluationMetrics = array_map(
            fn(array $item) => AlgorithmMetrics::fromArray($item),
            $data['evaluation_metrics'] ?? []
        );

        $this->clusters = array_map(
            fn(array $item) => ClusterDetail::fromArray($item),
            $data['clusters'] ?? []
        );

        $this->customerLabels = array_map(
            fn(array $item) => CustomerLabel::fromArray($item),
            $data['customer_labels'] ?? []
        );
    }
}
