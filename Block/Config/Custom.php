<?php
declare(strict_types=1);
namespace Epam\Fundamentals\Block\Config;

use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;

class Custom extends Field
{
    /**
     * @param AbstractElement $element
     * @return string
     */
    protected function _getElementHtml(AbstractElement $element)
    {
        return 'This is custom config block output';
    }
}
