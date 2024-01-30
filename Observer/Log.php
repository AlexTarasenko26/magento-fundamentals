<?php
declare(strict_types=1);

namespace Epam\Fundamentals\Observer;

use Magento\Framework\Event\Observer;
use Psr\log\LoggerInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Event\ObserverInterface;

class Log implements ObserverInterface
{
    /**
     * @param LoggerInterface $logger
     * @param RequestInterface $request
     */
    public function __construct(
        private readonly LoggerInterface $logger,
        private readonly RequestInterface $request
    )
    {
    }

    public function execute(Observer $observer)
    {
//        $this->logger->critical('Request URI: ' . $this->request->getPathInfo());
    }
}
