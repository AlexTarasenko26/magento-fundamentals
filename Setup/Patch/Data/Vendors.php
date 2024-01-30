<?php
declare(strict_types=1);

namespace Epam\Fundamentals\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class Vendors implements DataPatchInterface
{

    /**
     * @param ModuleDataSetupInterface $moduleDataSetup
     */
    public function __construct(
        private readonly ModuleDataSetupInterface $moduleDataSetup
    )
    {
    }

    /**
     * @return array|string[]
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * @return array|string[]
     */
    public function getAliases()
    {
        return [];
    }

    public function apply()
    {
        $data = [
            ['code' => 'Auchan', 'contact' => '38011122333', 'goods_type' => 'food&market'],
            ['code' => 'Lidl', 'contact' => '3801346341', 'goods_type' => 'food'],
            ['code' => 'Leroy', 'contact' => '38013473457', 'goods_type' => 'furniture']
        ];
        $this->moduleDataSetup->startSetup();
        $this->moduleDataSetup->getConnection()->insertMultiple(
            $this->moduleDataSetup->getTable('vendor_entity'), $data
        );
        $this->moduleDataSetup->endSetup();
    }
}
