<?php
declare(strict_types=1);

namespace Epam\Fundamentals\Controller\Block;


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

    public function execute()
    {
        $layout = $this->pageFactory->create()->getLayout();
        $block = $layout->createBlock('Epam\Fundamentals\Block\Text');
        $result = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_RAW);
        $result->setContents($block->toHtml());
        return $result;
    }
}
