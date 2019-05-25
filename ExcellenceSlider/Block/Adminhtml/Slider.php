<?php
namespace Excellence\ExcellenceSlider\Block\Adminhtml;
class Slider extends \Magento\Backend\Block\Widget\Grid\Container
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
		
        $this->_controller = 'adminhtml_slider';/*block grid.php directory*/
        $this->_blockGroup = 'Excellence_ExcellenceSlider';
        $this->_headerText = __('Slider');
        $this->_addButtonLabel = __('Add New Entry'); 
        parent::_construct();
		
    }
}
