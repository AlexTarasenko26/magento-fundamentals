<?php
declare(strict_types=1);

namespace Epam\Fundamentals\Controller\Product\View;

use Magento\Framework\View\Element\Template;

class Description extends Template
{
    /**
     * @param \Magento\Catalog\Block\Product\View\Description $description
     */
    public function beforeToHtml(\Magento\Catalog\Block\Product\View\Description $description): void
    {
        $description->getProduct()->setDescription('test description!');
    }

}
