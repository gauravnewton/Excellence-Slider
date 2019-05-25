<?php
namespace Excellence\ExcellenceSlider\Controller\Adminhtml\Slider;
use Magento\Framework\App\Filesystem\DirectoryList;
class Save extends \Magento\Backend\App\Action
{
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\Image\AdapterFactory $adapterFactory,
        \Magento\MediaStorage\Model\File\UploaderFactory $uploader,
        \Magento\Framework\Filesystem $filesystem
    ) {
        $this->adapterFactory = $adapterFactory;
        $this->uploader = $uploader;
        $this->filesystem = $filesystem;
        parent::__construct($context);
    }
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
	public function execute()
    {
		
        $data = $this->getRequest()->getParams();
        if ($data) {
            $model = $this->_objectManager->create('Excellence\ExcellenceSlider\Model\Slider');
		  // echo "<pre>";
    //       print_r($_FILES['path']);
    //       die("vgvhb");
            //start block upload image
            if (isset($_FILES['path']) && isset($_FILES['path']['name']) && strlen($_FILES['path']['name'])) {
                /*
                * Save image upload
                */
                try {
                    $base_media_path = 'excellenceslider';
                    $uploader = $this->uploader->create(
                    ['fileId' => 'path']
                    );
                    $uploader->setAllowedExtensions(['jpg', 'jpeg', 'gif', 'png']);
                    $imageAdapter = $this->adapterFactory->create();
                    $uploader->addValidateCallback('path', $imageAdapter, 'validateUploadFile');
                    $uploader->setAllowRenameFiles(true);
                    $uploader->setFilesDispersion(true);
                    $mediaDirectory = $this->filesystem->getDirectoryRead(\Magento\Framework\App\Filesystem\DirectoryList::MEDIA);
                    $result = $uploader->save(
                    $mediaDirectory->getAbsolutePath($base_media_path)
                    );
                    $data['path'] = $base_media_path.$result['file'];
                } catch (\Exception $e) {
                    if ($e->getCode() == 0) {
                        $this->messageManager->addError($e->getMessage());
                    }
                }
            } else {
                if (isset($data['path']) && isset($data['path']['value'])) {
                    if (isset($data['path']['delete'])) {
                        $data['path'] = null;
                        $data['delete_image'] = true;
                    } elseif (isset($data['path']['value'])) {
                        $data['path'] = $data['path']['value'];
                    } else {
                        $data['path'] = null;
                    }
                }
            }
            //end block upload image
            




			$id = $this->getRequest()->getParam('id');
            if ($id) {
                $model->load($id);
            }
			
            $model->setData($data);
			
            try {
                $model->save();
                $this->messageManager->addSuccess(__('Slide Has been Saved.'));
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData(false);
                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('*/*/edit', array('id' => $model->getId(), '_current' => true));
                    return;
                }
                $this->_redirect('*/*/');
                return;
            } catch (\Magento\Framework\Model\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\RuntimeException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the banner.'));
            }

            $this->_getSession()->setFormData($data);
            $this->_redirect('*/*/edit', array('banner_id' => $this->getRequest()->getParam('banner_id')));
            return;
        }
        $this->_redirect('*/*/');
    }
}
