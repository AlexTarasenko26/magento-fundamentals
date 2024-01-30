<?php
declare(strict_types=1);

namespace Epam\Fundamentals\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;

class LogPageOutput implements ObserverInterface
{
    /**
     * @param LoggerInterface $logger
     */
    public function __construct(
        private readonly LoggerInterface $logger
    )
    {
    }

    /**
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        $response = $observer->getEvent()->getData('response');
        $body = $response->getBody();
        $body = substr($body, 0, 1000);
//        $this->logger->info("--------\n\n\n BODY \n\n\n " . $body, []);
    }
}
