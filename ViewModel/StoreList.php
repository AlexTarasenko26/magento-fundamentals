<?php
declare(strict_types=1);

namespace Epam\Fundamentals\ViewModel;

use Magento\Catalog\Model\CategoryFactory;
use Magento\Catalog\Model\ResourceModel\Category as CategoryResource;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Store\Model\StoreManager;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class StoreList implements ArgumentInterface
{
    /**
     * @param CategoryFactory $categoryFactory
     * @param CategoryResource $categoryResource
     * @param StoreManager $storeManager
     */
    public function __construct(
        private readonly CategoryFactory $categoryFactory,
        private readonly CategoryResource $categoryResource,
        private readonly StoreManager    $storeManager
    )
    {
    }

    /**
     * @return string
     */
    public function getRootCategories(): string
    {
        $storesList = $this->storeManager->getStores();
        $catalogCategory = $this->categoryFactory->create();
        $stores = [];
        foreach ($storesList as $store) {
            try {
                $this->categoryResource->load($catalogCategory, $store->getRootCategoryId());
                $categoryName = $catalogCategory->getName();
                $stores[] = [
                    'store_name' => $store->getName(), 'root_category_name' => $categoryName
                ];
            } catch (NoSuchEntityException $exception) {
                $stores = [];
            }
        }
        $stores = array_map(function ($item) {
            $string = '<b>STORE</b> ' . $item['store_name'] . '<br>';
            $string .= ' <b>ROOT CATEGORY</b> ' . $item['root_category_name'] . '<br><br>';
            return $string;
        }, $stores);
        return implode('', $stores);
    }

}
