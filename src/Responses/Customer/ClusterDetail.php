<?php

declare(strict_types=1);

namespace EchoIntel\Responses\Customer;

use EchoIntel\Responses\Common\EchoIntelResponse;

class ClusterDetail extends EchoIntelResponse
{
    public int $clusterId;
    public int $size;
    public array $centroid;
    public string $personaLabel;

    protected function hydrate(array $data): void
    {
        $this->clusterId = (int) ($data['cluster_id'] ?? 0);
        $this->size = (int) ($data['size'] ?? 0);
        $this->centroid = $data['centroid'] ?? [];
        $this->personaLabel = $data['persona_label'] ?? '';
    }
}
