<?php
declare(strict_types=1);

namespace Dolphin\TechFeatures\Model\Catalogproducttechfeatures;

use Dolphin\TechFeatures\Model\ResourceModel\CatalogProductTechfeatures\CollectionFactory;
use Magento\Framework\App\Request\DataPersistorInterface;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{

    protected $loadedData;
    protected $dataPersistor;
    protected $_storeManager;
    protected $collection;


    /**
     * Constructor
     *
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $collectionFactory
     * @param DataPersistorInterface $dataPersistor
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        DataPersistorInterface $dataPersistor,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $collectionFactory->create();
        $this->dataPersistor = $dataPersistor;
        $this->_storeManager = $storeManager;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $items = $this->collection->getItems();
        foreach ($items as $model) {
            $this->loadedData[$model->getId()] = $model->getData();
            if ($model->getImage()) {
				$m['image'][0]['name'] = $model->getImage();
				$m['image'][0]['url'] = $this->getMediaUrl() . $model->getImage();
				$fullData = $this->loadedData;
				$this->loadedData[$model->getId()] = array_merge($fullData[$model->getId()], $m);
			}
        }
        $data = $this->dataPersistor->get('catalog_product_techfeatures');
        
        if (!empty($data)) {
            $model = $this->collection->getNewEmptyItem();
            $model->setData($data);
            $this->loadedData[$model->getId()] = $model->getData();
            $this->dataPersistor->clear('catalog_product_techfeatures');
        }
        
        return $this->loadedData;
    }

    public function getMediaUrl() {
		$mediaUrl = $this->_storeManager->getStore()
			->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA) . 'dolphin/tmp/techfeatures/';
		return $mediaUrl;
	}
}

