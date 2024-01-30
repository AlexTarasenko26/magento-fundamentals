<?php
declare(strict_types=1);
namespace Epam\Fundamentals\Block;

use Magento\Framework\View\Element\AbstractBlock;

class Text extends AbstractBlock
{
    /**
     * @return string
     */
    protected function _toHtml()
    {
        return "<b>Here is a new block!</b>";
    }
}
