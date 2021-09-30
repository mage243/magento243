<?php
declare(strict_types=1);

namespace Dolphin\TechFeatures\Model\ResourceModel\CatalogProductTechfeatures;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * @var string
     */
    protected $_idFieldName = 'id';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \Dolphin\TechFeatures\Model\CatalogProductTechfeatures::class,
            \Dolphin\TechFeatures\Model\ResourceModel\CatalogProductTechfeatures::class
        );
    }
}

