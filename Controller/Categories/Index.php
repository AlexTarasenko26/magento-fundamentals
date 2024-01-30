<?php
declare(strict_types=1);

namespace Epam\Fundamentals\Controller\Categories;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\Page;

class Index implements HttpGetActionInterface
{
    /**
     * @param ResultFactory $resultFactory
     */
    public function __construct(
        private readonly ResultFactory $resultFactory
    )
    {
    }

    /**
     * @return ResponseInterface|ResultInterface|Page|(Page&ResultInterface)
     */
    public function execute()
    {
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}
