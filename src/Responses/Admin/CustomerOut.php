<?php

declare(strict_types=1);

namespace EchoIntel\Responses\Admin;

use EchoIntel\Responses\Common\EchoIntelResponse;

class CustomerOut extends EchoIntelResponse
{
    public string $customerApiId;
    public string $secret;
    public bool $enabled;
    public string $tsCreate;
    public string $tsUpdate;
    public array $allowedRoutes;

    protected function hydrate(array $data): void
    {
        $this->customerApiId = $data['customer_api_id'] ?? '';
        $this->secret = $data['secret'] ?? '';
        $this->enabled = (bool) ($data['enabled'] ?? false);
        $this->tsCreate = $data['ts_create'] ?? '';
        $this->tsUpdate = $data['ts_update'] ?? '';
        $this->allowedRoutes = $data['allowed_routes'] ?? [];
    }
}
