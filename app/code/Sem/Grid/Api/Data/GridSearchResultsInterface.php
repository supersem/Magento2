<?php
declare(strict_types = 1);

namespace Sem\Grid\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface GridSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get Grid list.
     *
     * @return array
     */
    public function getItems(): array;

    /**
     * Set customer_entity_id list.
     *
     * @param array $items
     *
     * @return $this
     */
    public function setItems(array $items): GridSearchResultsInterface;
}
