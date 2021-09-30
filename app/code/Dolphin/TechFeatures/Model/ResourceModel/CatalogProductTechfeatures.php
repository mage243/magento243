<?php
declare(strict_types=1);

namespace Dolphin\TechFeatures\Model\ResourceModel;

class CatalogProductTechfeatures extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('catalog_product_techfeatures', 'id');
    }
}

