<?php
declare(strict_types=1);

namespace Dolphin\TechFeatures\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface CatalogProductTechfeaturesRepositoryInterface
{

    /**
     * Save catalog_product_techfeatures
     * @param \Dolphin\TechFeatures\Api\Data\CatalogProductTechfeaturesInterface $catalogProductTechfeatures
     * @return \Dolphin\TechFeatures\Api\Data\CatalogProductTechfeaturesInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Dolphin\TechFeatures\Api\Data\CatalogProductTechfeaturesInterface $catalogProductTechfeatures
    );

    /**
     * Retrieve catalog_product_techfeatures
     * @param string $catalogProductTechfeaturesId
     * @return \Dolphin\TechFeatures\Api\Data\CatalogProductTechfeaturesInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($catalogProductTechfeaturesId);

    /**
     * Retrieve catalog_product_techfeatures matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Dolphin\TechFeatures\Api\Data\CatalogProductTechfeaturesSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete catalog_product_techfeatures
     * @param \Dolphin\TechFeatures\Api\Data\CatalogProductTechfeaturesInterface $catalogProductTechfeatures
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Dolphin\TechFeatures\Api\Data\CatalogProductTechfeaturesInterface $catalogProductTechfeatures
    );

    /**
     * Delete catalog_product_techfeatures by ID
     * @param string $catalogProductTechfeaturesId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($catalogProductTechfeaturesId);
}

