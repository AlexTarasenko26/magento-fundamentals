<?php

namespace Epam\Fundamentals\Controller\Layout;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\PageFactory;

class Onepage implements HttpGetActionInterface
{

    /**
     * @param PageFactory $pageFactory
     */
    public function __construct(
        private readonly PageFactory $pageFactory
    )
    {
    }

    /**
     * @return ResultInterface
     */
    public function execute(): ResultInterface
    {
        return $this->pageFactory->create();
    }
}
