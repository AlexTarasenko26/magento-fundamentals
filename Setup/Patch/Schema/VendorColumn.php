<?php
declare(strict_types=1);
namespace Epam\Fundamentals\Setup\Patch\Schema;

use Magento\Framework\Setup\Patch\SchemaPatchInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class VendorColumn implements SchemaPatchInterface
{

    /**
     * @param SchemaSetupInterface $moduleSchemaSetup
     */
    public function __construct
    (
        private readonly SchemaSetupInterface $moduleSchemaSetup
    )
    {

    }

    public static function getDependencies()
    {
        return [];
    }

    public function getAliases()
    {
        return [];
    }

    public function apply()
    {
        $this->moduleSchemaSetup->startSetup();
        $this->moduleSchemaSetup->getConnection()->addColumn('vendor_entity',
            'goods_type',
            [
                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                'length' => 64,
                'unsigned' => true,
                'nullable' => false,
                'comment' => 'Vendor goods type'
            ]
        );
        $this->moduleSchemaSetup->endSetup();
    }
}
