<?php
declare(strict_types=1);

namespace Dolphin\TechFeatures\Model;

use Dolphin\TechFeatures\Api\Data\CatalogProductTechfeaturesInterface;
use Dolphin\TechFeatures\Api\Data\CatalogProductTechfeaturesInterfaceFactory;
use Magento\Framework\Api\DataObjectHelper;

class CatalogProductTechfeatures extends \Magento\Framework\Model\AbstractModel
{

    protected $catalog_product_techfeaturesDataFactory;

    protected $dataObjectHelper;

    protected $_eventPrefix = 'catalog_product_techfeatures';

    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param CatalogProductTechfeaturesInterfaceFactory $catalog_product_techfeaturesDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \Dolphin\TechFeatures\Model\ResourceModel\CatalogProductTechfeatures $resource
     * @param \Dolphin\TechFeatures\Model\ResourceModel\CatalogProductTechfeatures\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        CatalogProductTechfeaturesInterfaceFactory $catalog_product_techfeaturesDataFactory,
        DataObjectHelper $dataObjectHelper,
        \Dolphin\TechFeatures\Model\ResourceModel\CatalogProductTechfeatures $resource,
        \Dolphin\TechFeatures\Model\ResourceModel\CatalogProductTechfeatures\Collection $resourceCollection,
        array $data = []
    ) {
        $this->catalog_product_techfeaturesDataFactory = $catalog_product_techfeaturesDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve catalog_product_techfeatures model with catalog_product_techfeatures data
     * @return CatalogProductTechfeaturesInterface
     */
    public function getDataModel()
    {
        $catalog_product_techfeaturesData = $this->getData();
        
        $catalog_product_techfeaturesDataObject = $this->catalog_product_techfeaturesDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $catalog_product_techfeaturesDataObject,
            $catalog_product_techfeaturesData,
            CatalogProductTechfeaturesInterface::class
        );
        
        return $catalog_product_techfeaturesDataObject;
    }
}

