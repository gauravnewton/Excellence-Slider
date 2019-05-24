<?php
namespace Excellence\ExcellenceSlider\Helper;
class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
     public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Excellence\Hello\Model\TestFactory $testFactory,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    )
    {
        $this->_resultPageFactory = $resultPageFactory; 
        $this->_testFactory = $testFactory; 
        $this->_scopeConfig = $scopeConfig;
        return parent::__construct( $context);
    }
    public function execute()
    {
       return ($this->_scopeConfig->getValue('excellence/active_display/scope'));
    }
}