<?php
declare(strict_types=1);

namespace Dolphin\TechFeatures\Model;

use Dolphin\TechFeatures\Api\CatalogProductTechfeaturesRepositoryInterface;
use Dolphin\TechFeatures\Api\Data\CatalogProductTechfeaturesInterfaceFactory;
use Dolphin\TechFeatures\Api\Data\CatalogProductTechfeaturesSearchResultsInterfaceFactory;
use Dolphin\TechFeatures\Model\ResourceModel\CatalogProductTechfeatures as ResourceCatalogProductTechfeatures;
use Dolphin\TechFeatures\Model\ResourceModel\CatalogProductTechfeatures\CollectionFactory as CatalogProductTechfeaturesCollectionFactory;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Store\Model\StoreManagerInterface;

class CatalogProductTechfeaturesRepository implements CatalogProductTechfeaturesRepositoryInterface
{

    protected $resource;

    protected $extensibleDataObjectConverter;
    protected $searchResultsFactory;

    protected $dataCatalogProductTechfeaturesFactory;

    private $storeManager;

    protected $catalogProductTechfeaturesFactory;

    protected $dataObjectHelper;

    protected $dataObjectProcessor;

    protected $extensionAttributesJoinProcessor;

    private $collectionProcessor;

    protected $catalogProductTechfeaturesCollectionFactory;


    /**
     * @param ResourceCatalogProductTechfeatures $resource
     * @param CatalogProductTechfeaturesFactory $catalogProductTechfeaturesFactory
     * @param CatalogProductTechfeaturesInterfaceFactory $dataCatalogProductTechfeaturesFactory
     * @param CatalogProductTechfeaturesCollectionFactory $catalogProductTechfeaturesCollectionFactory
     * @param CatalogProductTechfeaturesSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        ResourceCatalogProductTechfeatures $resource,
        CatalogProductTechfeaturesFactory $catalogProductTechfeaturesFactory,
        CatalogProductTechfeaturesInterfaceFactory $dataCatalogProductTechfeaturesFactory,
        CatalogProductTechfeaturesCollectionFactory $catalogProductTechfeaturesCollectionFactory,
        CatalogProductTechfeaturesSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
        $this->resource = $resource;
        $this->catalogProductTechfeaturesFactory = $catalogProductTechfeaturesFactory;
        $this->catalogProductTechfeaturesCollectionFactory = $catalogProductTechfeaturesCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataCatalogProductTechfeaturesFactory = $dataCatalogProductTechfeaturesFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
        $this->collectionProcessor = $collectionProcessor;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->extensibleDataObjectConverter = $extensibleDataObjectConverter;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        \Dolphin\TechFeatures\Api\Data\CatalogProductTechfeaturesInterface $catalogProductTechfeatures
    ) {
        /* if (empty($catalogProductTechfeatures->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $catalogProductTechfeatures->setStoreId($storeId);
        } */
        
        $catalogProductTechfeaturesData = $this->extensibleDataObjectConverter->toNestedArray(
            $catalogProductTechfeatures,
            [],
            \Dolphin\TechFeatures\Api\Data\CatalogProductTechfeaturesInterface::class
        );
        
        $catalogProductTechfeaturesModel = $this->catalogProductTechfeaturesFactory->create()->setData($catalogProductTechfeaturesData);
        
        try {
            $this->resource->save($catalogProductTechfeaturesModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the catalogProductTechfeatures: %1',
                $exception->getMessage()
            ));
        }
        return $catalogProductTechfeaturesModel->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function get($catalogProductTechfeaturesId)
    {
        $catalogProductTechfeatures = $this->catalogProductTechfeaturesFactory->create();
        $this->resource->load($catalogProductTechfeatures, $catalogProductTechfeaturesId);
        if (!$catalogProductTechfeatures->getId()) {
            throw new NoSuchEntityException(__('catalog_product_techfeatures with id "%1" does not exist.', $catalogProductTechfeaturesId));
        }
        return $catalogProductTechfeatures->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->catalogProductTechfeaturesCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \Dolphin\TechFeatures\Api\Data\CatalogProductTechfeaturesInterface::class
        );
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model->getDataModel();
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        \Dolphin\TechFeatures\Api\Data\CatalogProductTechfeaturesInterface $catalogProductTechfeatures
    ) {
        try {
            $catalogProductTechfeaturesModel = $this->catalogProductTechfeaturesFactory->create();
            $this->resource->load($catalogProductTechfeaturesModel, $catalogProductTechfeatures->getCatalogProductTechfeaturesId());
            $this->resource->delete($catalogProductTechfeaturesModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the catalog_product_techfeatures: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($catalogProductTechfeaturesId)
    {
        return $this->delete($this->get($catalogProductTechfeaturesId));
    }
}

