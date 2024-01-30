<?php
declare(strict_types=1);
namespace Epam\Fundamentals\Controller;

use Magento\Framework\App\RequestInterface;

class NoRouteHandler implements \Magento\Framework\App\Router\NoRouteHandlerInterface
{

    /**
     * @param RequestInterface $request
     * @return bool
     */
    public function process(\Magento\Framework\App\RequestInterface $request)
    {
        if ($request->getFrontName() == "admin") {
            return false;
        }
        $moduleName = 'cms';
        $controllerName = 'index';
        $actionName = 'index';
        $request
            ->setModuleName($moduleName)
            ->setControllerName($controllerName)
            ->setActionName($actionName);
        return true;
    }
}
