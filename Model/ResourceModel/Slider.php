<?php
namespace Excellence\ExcellenceSlider\Model\ResourceModel;
class Slider extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('excellence_excellenceslider_slider','slider_id');
    }
}
