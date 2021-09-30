<?php
declare(strict_types=1);

namespace Dolphin\TechFeatures\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper
{

    protected $catalogProductTechfeatures;

    protected $storeManager;

    /**
     * @param \Magento\Framework\App\Helper\Context $context
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Dolphin\TechFeatures\Model\CatalogProductTechfeatures $catalogProductTechfeatures,
        \Magento\Store\Model\StoreManagerInterface $storeManager
    ) {
        $this->catalogProductTechfeatures = $catalogProductTechfeatures;
        $this->storeManager = $storeManager;
        parent::__construct($context);
    }

    public function techFeaturesCollection($data = array()){
        
        $techcollection = $this->catalogProductTechfeatures->getCollection();
        $techcollection->addFieldToFilter('id', array('in' => $data));
        return $techcollection;

    }

    public function imageUrl(){
        return $this->storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA). 'dolphin/tmp/techfeatures/';
    }

    
}
