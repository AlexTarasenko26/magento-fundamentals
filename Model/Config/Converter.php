<?php
declare(strict_types=1);

namespace Epam\Fundamentals\Model\Config;

class Converter implements \Magento\Framework\Config\ConverterInterface
{

    /**
     * Convert dom node tree to array
     *
     * @param \DOMDocument $source
     * @return array
     * @throws \InvalidArgumentException
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     */
    public function convert($source)
    {
        $output = [];
        $xpath = new \DOMXPath($source);
        $messages = $xpath->evaluate('/config/welcome_message');
        /** @var $messageNode \DOMNode */
        foreach ($messages as $messageNode) {
            $storeId = $this->_getAttributeValue($messageNode, 'store_id');
            $data = [];
            /** @var $childNode \DOMNode */
            foreach ($messageNode->childNodes as $childNode) {
                $data = ['message' => $childNode->nodeValue];
            }
            $output['messages'][$storeId] = $data;
        }
        return $output;
    }

    /**
     * @param \DOMNode $input
     * @param $attributeName
     * @param $default
     * @return mixed|string|null
     */
    protected function _getAttributeValue(\DOMNode $input, $attributeName, $default = null)
    {
        $node = $input->attributes->getNamedItem($attributeName);
        return $node ? $node->nodeValue : $default;
    }
}
