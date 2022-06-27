<?php

namespace Sem\Teammate\Model\ResourceModel\Teammate;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
  public function _construct()
  {
      $this->_init('Sem\Teammate\Model', 'Sem\Teammate\Model\ResourceModel');
  }    
}