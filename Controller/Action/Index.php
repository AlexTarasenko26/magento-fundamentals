<?php
declare(strict_types=1);

namespace Epam\Fundamentals\Controller\Action;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\View\Result\PageFactory;

class Index implements HttpGetActionInterface
{
    /**
     * @param ResultFactory $resultFactory
     * @param PageFactory $pageFactory
     */
    public function __construct(
        private readonly ResultFactory $resultFactory,
        private readonly PageFactory   $pageFactory
    )
    {
    }

    /**
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $block = $this->pageFactory->create()->getLayout()->createBlock('Epam\Fundamentals\Block\Template');
        $block->setTemplate('template.phtml');
        $result = $this->resultFactory->create(ResultFactory::TYPE_RAW);
        $result->setContents($block->toHtml());
        return $result;
    }
}
