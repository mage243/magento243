<?php
declare(strict_types=1);

namespace Dolphin\TechFeatures\Api\Data;

interface CatalogProductTechfeaturesInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{

    const CATALOG_PRODUCT_TECHFEATURES_ID = 'id';
    const DESCRIPTION = 'description';
    const IMAGE = 'image';
    const TITLE = 'title';

    /**
     * Get id
     * @return string|null
     */
    public function getCatalogProductTechfeaturesId();

    /**
     * Set id
     * @param string $catalogProductTechfeaturesId
     * @return \Dolphin\TechFeatures\Api\Data\CatalogProductTechfeaturesInterface
     */
    public function setCatalogProductTechfeaturesId($catalogProductTechfeaturesId);

    /**
     * Get title
     * @return string|null
     */
    public function getTitle();

    /**
     * Set title
     * @param string $title
     * @return \Dolphin\TechFeatures\Api\Data\CatalogProductTechfeaturesInterface
     */
    public function setTitle($title);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Dolphin\TechFeatures\Api\Data\CatalogProductTechfeaturesExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \Dolphin\TechFeatures\Api\Data\CatalogProductTechfeaturesExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Dolphin\TechFeatures\Api\Data\CatalogProductTechfeaturesExtensionInterface $extensionAttributes
    );

    /**
     * Get image
     * @return string|null
     */
    public function getImage();

    /**
     * Set image
     * @param string $image
     * @return \Dolphin\TechFeatures\Api\Data\CatalogProductTechfeaturesInterface
     */
    public function setImage($image);

    /**
     * Get description
     * @return string|null
     */
    public function getDescription();

    /**
     * Set description
     * @param string $description
     * @return \Dolphin\TechFeatures\Api\Data\CatalogProductTechfeaturesInterface
     */
    public function setDescription($description);
}

