<?php
declare(strict_types=1);

namespace C4B\FreeProduct\Setup;

use C4B\FreeProduct\SalesRule\Action\GiftAction;
use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
    /**
     * {@inheritdoc}
     */
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $setup->getConnection()->addColumn(
            $setup->getTable('salesrule'),
            GiftAction::RULE_DATA_KEY_QTY,
            [
                'type'    => Table::TYPE_INTEGER,
                'length'  => 10,
                'default' => 1,
                'comment' => 'Gift product qty'
            ]
        );

        $setup->endSetup();
    }
}