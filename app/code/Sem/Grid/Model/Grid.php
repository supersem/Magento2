<?php

namespace Sem\Grid\Model;

use Magento\Framework\Model\AbstractModel;

class Grid extends AbstractModel
{
    protected function _construct()
    {
        $this->_init('Sem\Grid\Model\ResourceModel\Grid');
    }
}