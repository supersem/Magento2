<?php

namespace Sem\Teammate\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $table = $setup->getConnection()->newTable(
              $setup->getTable('elogic_teammate')
              )->addColumn(
                  'entity_id', 
                  Table::TYPE_INTEGER,
                  null,
                  ['identity'=> true, 'nullable' => false, 'primary' => true],
                  'Entity ID'
              )->addColumn(
                  'name',
                  Table::TYPE_TEXT,
                  100,
                  ['nullable' => false],
                  'Entity Name'
              )->addIndex(
                  $setup->getIdxName('teammate', ['name']),
                  ['name']
              )->setComment(
                 'Sample Teammates'
              );
        $setup->getConnection()->createTable($table);
            
        $setup->endSetup();
    }
}