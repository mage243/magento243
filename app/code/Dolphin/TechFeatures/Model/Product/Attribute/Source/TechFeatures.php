<?php
declare(strict_types=1);

namespace Dolphin\TechFeatures\Model\Product\Attribute\Source;

use Dolphin\TechFeatures\Model\ResourceModel\CatalogProductTechfeatures\CollectionFactory;

class TechFeatures extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
     /** @var CollectionFactory */
     protected $_techfeaturesCollection;

     /**
      * TechfeaturesCollection constructor.
      * @param CollectionFactory $TechfeaturesCollection
      */
     public function __construct(CollectionFactory $techfeaturesCollection)
     {
         $this->_techfeaturesCollection = $techfeaturesCollection;
     }


     /**
     * Get Gift Card available templates
     *
     * @return array
     */
    public function getAvailableTemplate()
    {
        $techfeatures = $this->_techfeaturesCollection->create();
        $listTech = [];
        $duplicatedTechCheck = [];
        foreach ($techfeatures as $techfeature) {
            $value = $techfeature->getId();
            $techTitle = $techfeature->getTitle();
            if (isset($duplicatedTechCheck[$techTitle])) {
                $duplicatedTechCheck[$techTitle]++;
                $techTitle = $techTitle . '-' . $duplicatedTechCheck[$techTitle];
            } else {
                $duplicatedTechCheck[$techTitle] = 1;
            }
            $listTech[$value] = [
                'label' => $techTitle,
                'value' => $value,
            ];
        }

        return $listTech;
    }
    /**
     * getAllOptions
     *
     * @return array
     */
    public function getAllOptions($withEmpty = true)
    {
        $options = $this->getAvailableTemplate();
        if ($withEmpty) {
            array_unshift(
                $options,
                [
                    'value' => null,
                    'label' => __('-- Please Select --'),
                ]
            );
        }
        return $options;
    }
}
