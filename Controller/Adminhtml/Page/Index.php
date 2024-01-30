<?php
declare(strict_types=1);

namespace Epam\Fundamentals\Controller\Adminhtml\Page;

use Magento\Backend\App\Action;
use Magento\Backend\Model\View\Result\Page;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\App\Action\Context;

class Index extends Action implements HttpGetActionInterface
{
    const ADMIN_RESOURCE = "Epam_Fundamentals::new_page";

    /**
     * @param Context $context
     * @param PageFactory $pageFactory
     */
    public function __construct(
        Context                      $context,
        private readonly PageFactory $pageFactory
    )
    {
        parent::__construct($context);
    }

    /**
     * @return Page
     */
    public function execute()
    {
        /** @var Page $backendPage */
        $backendPage = $this->pageFactory->create();
        $backendPage->setActiveMenu('Epam_Fundamentals::new_admin_page');
        $backendPage->addBreadcrumb(__('Dashboard'), __('New Admin Page'));
        $backendPage->getConfig()->getTitle()->prepend(__('New Admin Page'));
        return $backendPage;
    }
}
