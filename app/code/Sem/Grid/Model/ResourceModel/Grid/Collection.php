<?php

namespace Sem\Grid\Model\ResourceModel\Grid;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'entity_id';
   
    protected function _construct()
    {
        $this->_init('Sem\Grid\Model\Grid', 'Sem\Grid\Model\ResourceModel\Grid');
    }
}

