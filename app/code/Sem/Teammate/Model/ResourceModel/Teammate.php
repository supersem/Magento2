<?php

namespace Sem\Teammate\Model\ResourceModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb; 

class Teammate extends AbstractDb {

    public function _construct() 
  {
      $this->_init('elogic_teammate', 'entity_id');
}
}
  