<?php
 
namespace Excellence\ExcellenceSlider\Controller\Adminhtml\Slider;
 
class Index extends \Magento\Backend\App\Action
{
    
    protected $resultPageFactory = false;
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        // $d = $this->getRequest()->getPostValue();
        // echo "<pre>";
        // print_r($d);die("dcfvgbhj");
        $resultPage->setActiveMenu('Excellence_ExcellenceSlider::excellence_slider_menu1');
        $resultPage->addBreadcrumb(__('Excellence'), __('Excellence'));
        $resultPage->addBreadcrumb(__('Slider'), __('Slider'));
        $resultPage->getConfig()->getTitle()->prepend(__('Excellence Slider'));
        return $resultPage;
    }
}