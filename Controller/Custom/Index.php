<?php
declare(strict_types=1);

namespace Epam\Fundamentals\Controller\Custom;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\Raw;
use Magento\Framework\Controller\ResultFactory;
use Epam\Fundamentals\Model\Config;
use Magento\Framework\Controller\ResultInterface;

class Index implements HttpGetActionInterface
{

    /**
     * @param Config $customConfig
     * @param ResultFactory $resultFactory
     */
    public function __construct(
        private readonly Config        $customConfig,
        private readonly ResultFactory $resultFactory
    )
    {
    }

    /**
     * @return ResponseInterface|Raw|(Raw&ResultInterface)|ResultInterface
     */
    public function execute()
    {
        /*
        $storeId = 3;
        $storeWelcomeMsg = $this->customConfig->get('messages/' . $storeId . '/message');
        $result = $this->resultFactory->create(ResultFactory::TYPE_RAW);
        $result->setContents($storeWelcomeMsg);
        return $result;
        */
        $result = $this->resultFactory->create(ResultFactory::TYPE_RAW);
        $result->setContents('Hello World');
        return $result;
    }
}
