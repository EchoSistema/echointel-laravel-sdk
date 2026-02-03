<?php

declare(strict_types=1);

namespace EchoIntel\Responses\Inventory;

use EchoIntel\Responses\Common\EchoIntelResponse;

class DailyInventoryRecord extends EchoIntelResponse
{
    public string $date;
    public float $purchaseQuantity;
    public float $salesQuantity;
    public float $netChange;
    public float $closingInventory;
    public string $activity;
    public ?float $pctChange;

    protected function hydrate(array $data): void
    {
        $this->date = $data['date'] ?? '';
        $this->purchaseQuantity = (float) ($data['purchase_quantity'] ?? 0);
        $this->salesQuantity = (float) ($data['sales_quantity'] ?? 0);
        $this->netChange = (float) ($data['net_change'] ?? 0);
        $this->closingInventory = (float) ($data['closing_inventory'] ?? 0);
        $this->activity = $data['activity'] ?? '';
        $this->pctChange = isset($data['pct_change']) ? (float) $data['pct_change'] : null;
    }
}
