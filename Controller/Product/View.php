<?php
declare(strict_types=1);

namespace Epam\Fundamentals\Controller\Product;

use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;

class View
{
    /**
     * @param \Magento\Catalog\Controller\Product\View $controller
     * @param $result
     * @return mixed
     */
    public function afterExecute(\Magento\Catalog\Controller\Product\View $controller, $result)
    {
        return $result;
    }
}
