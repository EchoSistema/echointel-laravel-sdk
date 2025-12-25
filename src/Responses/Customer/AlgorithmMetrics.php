<?php

declare(strict_types=1);

namespace EchoIntel\Responses\Customer;

use EchoIntel\Responses\Common\EchoIntelResponse;

class AlgorithmMetrics extends EchoIntelResponse
{
    public string $algorithm;
    public array $params;
    public ?float $silhouette;
    public ?float $daviesBouldin;
    public ?float $calinskiHarabasz;
    public ?int $nClusters;

    protected function hydrate(array $data): void
    {
        $this->algorithm = $data['algorithm'] ?? '';
        $this->params = $data['params'] ?? [];
        $this->silhouette = isset($data['silhouette']) ? (float) $data['silhouette'] : null;
        $this->daviesBouldin = isset($data['davies_bouldin']) ? (float) $data['davies_bouldin'] : null;
        $this->calinskiHarabasz = isset($data['calinski_harabasz']) ? (float) $data['calinski_harabasz'] : null;
        $this->nClusters = isset($data['n_clusters']) ? (int) $data['n_clusters'] : null;
    }
}
