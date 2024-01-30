<?php
declare(strict_types=1);

namespace Epam\Fundamentals\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Catalog\Setup\CategorySetup;
use Magento\Catalog\Setup\CategorySetupFactory;
use Magento\Catalog\Model\Product;
use Magento\Catalog\Model\ResourceModel\Eav\Attribute as CatalogAttribute;

class Attribute implements DataPatchInterface
{

    /**
     * @param ModuleDataSetupInterface $moduleDataSetup
     */
    public function __construct(
        private readonly CategorySetupFactory     $categorySetupFactory,
        private readonly ModuleDataSetupInterface $moduleDataSetup
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
        $this->moduleDataSetup->startSetup();
        /** @var CategorySetup $catalogSetup */
        $catalogSetup = $this->categorySetupFactory->create(['setup' => $this->moduleDataSetup]);
        $catalogSetup->addAttribute(Product::ENTITY, 'flavor', [
            'label' => 'Flavor',
            'visible_on_front' => 1,
            'required' => 0,
            'global' => CatalogAttribute::SCOPE_GLOBAL
        ]);

        $attrParams = [
            'type' => 'text',
            'label' => 'Directions',
            'input' => 'multiselect',
            'required' => 0,
            'visible_on_front' => 1,
            'global' => CatalogAttribute::SCOPE_GLOBAL,
            'backend' => 'Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend',
            'option' => ['values' => [
                'left',
                'right',
                'up',
                'down'
            ]]
        ];
        $catalogSetup->addAttribute(Product::ENTITY, 'directions_multiselect', $attrParams);

        $this->moduleDataSetup->endSetup();
    }
}
