<?php
/**
 * @author Magenmagic Team
 * @copyright Copyright (c) 2019 Magenmagic
 * @package Magenmagic_DynamicSku
 */

namespace Magenmagic\DynamicSku\Plugin\Swatches\Block\Product\Renderer;

class Configurable
{
    public function afterGetJsonConfig(\Magento\Swatches\Block\Product\Renderer\Configurable $subject, $result)
    {

        $jsonResult = json_decode($result, true);
        $jsonResult['skus'] = [];

        foreach ($subject->getAllowProducts() as $simpleProduct) {
            $jsonResult['skus'][$simpleProduct->getId()] = $simpleProduct->getSku();
        }
        $result = json_encode($jsonResult);
        return $result;
    }
}
