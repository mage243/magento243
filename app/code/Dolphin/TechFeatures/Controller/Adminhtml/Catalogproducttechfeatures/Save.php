<?php
declare(strict_types=1);

namespace Dolphin\TechFeatures\Controller\Adminhtml\Catalogproducttechfeatures;

use Magento\Framework\Exception\LocalizedException;

class Save extends \Magento\Backend\App\Action
{

    protected $dataPersistor;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor
    ) {
        $this->dataPersistor = $dataPersistor;
        parent::__construct($context);
    }

    /**
     * Save action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        if ($data) {
            $id = $this->getRequest()->getParam('id');
        
            $model = $this->_objectManager->create(\Dolphin\TechFeatures\Model\CatalogProductTechfeatures::class)->load($id);
            if (!$model->getId() && $id) {
                $this->messageManager->addErrorMessage(__('This Technology Features no longer exists.'));
                return $resultRedirect->setPath('*/*/');
            } 
            
            if (array_key_exists("image", $data)) {
				$imageName = $data['image'][0]['name'];
				$data['image'] = $imageName;
			} else {
				$data['image'] = '';
			}
            

            $model->setData($data);
        
            try {
                $model->save();
                $this->messageManager->addSuccessMessage(__('You saved the Technology Features.'));
                $this->dataPersistor->clear('catalog_product_techfeatures');
        
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['id' => $model->getId()]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                echo $e;
                exit;
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the Technology Features.'));
            }
        
            $this->dataPersistor->set('catalog_product_techfeatures', $data);
            return $resultRedirect->setPath('*/*/edit', ['id' => $this->getRequest()->getParam('id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}

