/**
 * @author Magenmagic Team
 * @copyright Copyright (c) 2019 Magenmagic
 * @package Magenmagic_DynamicSku
 */

var config = {
    config: {
        mixins: {
            'Magento_ConfigurableProduct/js/configurable': {
                'Magenmagic_DynamicSku/js/model/skuswitch': true
            },
            'Magento_Swatches/js/swatch-renderer': {
                'Magenmagic_DynamicSku/js/model/swatch-skuswitch': true
            }
        }
    }
};