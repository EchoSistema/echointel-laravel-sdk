<?php

declare(strict_types=1);

namespace EchoIntel\Responses\Inventory;

use EchoIntel\Responses\Common\EchoIntelResponse;

class InventoryHistoryResponse extends EchoIntelResponse
{
    /** @var DailyInventoryRecord[] */
    public array $dailyInventory;

    public array $inventoryAnalysis;
    public array $inventoryAging;
    public ProductDetails $productDetails;
    public ProcessingInfo $processingInfo;

    protected function hydrate(array $data): void
    {
        $this->dailyInventory = array_map(
            fn(array $item) => DailyInventoryRecord::fromArray($item),
            $data['daily_inventory'] ?? []
        );

        $this->inventoryAnalysis = $data['inventory_analysis'] ?? [];
        $this->inventoryAging = $data['inventory_aging'] ?? [];
        $this->productDetails = ProductDetails::fromArray($data['product_details'] ?? []);
        $this->processingInfo = ProcessingInfo::fromArray($data['processing_info'] ?? []);
    }
}
