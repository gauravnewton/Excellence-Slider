<?php
namespace Excellence\ExcellenceSlider\Model\ResourceModel\Slider;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init('Excellence\ExcellenceSlider\Model\Slider','Excellence\ExcellenceSlider\Model\ResourceModel\Slider');
    }
}
