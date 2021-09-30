<?php
declare(strict_types=1);

namespace Dolphin\TechFeatures\Model\Data;

use Dolphin\TechFeatures\Api\Data\CatalogProductTechfeaturesInterface;

class CatalogProductTechfeatures extends \Magento\Framework\Api\AbstractExtensibleObject implements CatalogProductTechfeaturesInterface
{

    /**
     * Get id
     * @return string|null
     */
    public function getCatalogProductTechfeaturesId()
    {
        return $this->_get(self::CATALOG_PRODUCT_TECHFEATURES_ID);
    }

    /**
     * Set id
     * @param string $catalogProductTechfeaturesId
     * @return \Dolphin\TechFeatures\Api\Data\CatalogProductTechfeaturesInterface
     */
    public function setCatalogProductTechfeaturesId($catalogProductTechfeaturesId)
    {
        return $this->setData(self::CATALOG_PRODUCT_TECHFEATURES_ID, $catalogProductTechfeaturesId);
    }

    /**
     * Get title
     * @return string|null
     */
    public function getTitle()
    {
        return $this->_get(self::TITLE);
    }

    /**
     * Set title
     * @param string $title
     * @return \Dolphin\TechFeatures\Api\Data\CatalogProductTechfeaturesInterface
     */
    public function setTitle($title)
    {
        return $this->setData(self::TITLE, $title);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Dolphin\TechFeatures\Api\Data\CatalogProductTechfeaturesExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param \Dolphin\TechFeatures\Api\Data\CatalogProductTechfeaturesExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Dolphin\TechFeatures\Api\Data\CatalogProductTechfeaturesExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

    /**
     * Get image
     * @return string|null
     */
    public function getImage()
    {
        return $this->_get(self::IMAGE);
    }

    /**
     * Set image
     * @param string $image
     * @return \Dolphin\TechFeatures\Api\Data\CatalogProductTechfeaturesInterface
     */
    public function setImage($image)
    {
        return $this->setData(self::IMAGE, $image);
    }

    /**
     * Get description
     * @return string|null
     */
    public function getDescription()
    {
        return $this->_get(self::DESCRIPTION);
    }

    /**
     * Set description
     * @param string $description
     * @return \Dolphin\TechFeatures\Api\Data\CatalogProductTechfeaturesInterface
     */
    public function setDescription($description)
    {
        return $this->setData(self::DESCRIPTION, $description);
    }
}

