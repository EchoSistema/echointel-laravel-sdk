<?php

declare(strict_types=1);

namespace EchoIntel\Responses\Inventory;

use EchoIntel\Responses\Common\EchoIntelResponse;

class ProductDetails extends EchoIntelResponse
{
    public int $productCode;
    public float $salesUnityCost;
    public float $salesUnityPrice;
    public float $inventoryDailyCost;

    protected function hydrate(array $data): void
    {
        $this->productCode = (int) ($data['product_code'] ?? 0);
        $this->salesUnityCost = (float) ($data['sales_unity_cost'] ?? 0);
        $this->salesUnityPrice = (float) ($data['sales_unity_price'] ?? 0);
        $this->inventoryDailyCost = (float) ($data['inventory_daily_cost'] ?? 0);
    }
}
