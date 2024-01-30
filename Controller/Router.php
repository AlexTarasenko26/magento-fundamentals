<?php
declare(strict_types=1);
namespace Epam\Fundamentals\Controller;

use Magento\Framework\App\RequestInterface;

class Router implements \Magento\Framework\App\RouterInterface
{

    /**
     * @var \Magento\Framework\App\ActionFactory
     */
    protected $actionPath;

    /**
     * Router constructor.
     * @param \Magento\Framework\App\ActionFactory $actionFactory
     */
    public function __construct(\Magento\Framework\App\ActionFactory $actionFactory)
    {
        $this->actionPath = $actionFactory;
    }

    /**
     * @param \Magento\Framework\App\RequestInterface $request
     * @return \Magento\Framework\App\ActionInterface|null
     */
    public function match(\Magento\Framework\App\RequestInterface $request)
    {
        $testCategory = 'id/6';
        $info = $request->getPathInfo();
        if (preg_match("%^/(.*?)-(.*?)-(.*?)$%", $info, $m)) {
            $request->setPathInfo(sprintf("/%s/%s/%s/%s", $m[1], $m[2], $m[3],
                $testCategory));
            return $this->actionPath->create('Magento\Framework\App\Action\Forward',
                ['request' => $request]);
        }
        return null;
    }
}
