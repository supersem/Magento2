<?php

namespace Sem\Grid\Model;

use Magento\Framework\Model\AbstractModel;
use Sem\Grid\Api\Data\GridInterface;

class Grid extends AbstractModel implements GridInterface
{
    public const ENTITY    = 'sem_grid_grid';
    public const CACHE_TAG = 'sem_grid_grid';

    protected $_cacheTag    = 'sem_grid_grid';

    protected $_eventPrefix = 'sem_grid_grid';

    protected function _construct()
    {
        $this->_init('Sem\Grid\Model\ResourceModel\Grid');
    }

    /**
     * @inheritDoc
     */
    public function getEntityId(): ?string
    {
        return $this->getData(self::ENTITY_ID);
    }
}