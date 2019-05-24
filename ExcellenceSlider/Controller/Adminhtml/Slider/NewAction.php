<?php
 
 namespace Excellence\ExcellenceSlider\Controller\Adminhtml\Slider;
  
 class NewAction extends \Magento\Backend\App\Action
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
         $resultPage->setActiveMenu('Excellence_ExcellenceSlider::excellence_slider_menu1');
         $resultPage->addBreadcrumb(__('Excellence'), __('Excellence'));
         $resultPage->addBreadcrumb(__('Slider'), __('Slider'));
         $resultPage->getConfig()->getTitle()->prepend(__('Add New Slide'));
         return $resultPage;
     }
 }