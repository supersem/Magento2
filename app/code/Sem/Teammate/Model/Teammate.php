<?php

namespace Sem\Teammate\Model;

use Magento\Framework\Model\AbstractModel;

class Teammate extends AbstractModel {
    const ENTITY = 'elogic_teammate';
    public function _construct()
    {
        $this->_init('Sem\Teammate\Model\ResourceModel');
    }
}