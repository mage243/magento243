<?php
declare(strict_types=1);

namespace Dolphin\TechFeatures\Api\Data;

interface CatalogProductTechfeaturesSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get catalog_product_techfeatures list.
     * @return \Dolphin\TechFeatures\Api\Data\CatalogProductTechfeaturesInterface[]
     */
    public function getItems();

    /**
     * Set title list.
     * @param \Dolphin\TechFeatures\Api\Data\CatalogProductTechfeaturesInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

