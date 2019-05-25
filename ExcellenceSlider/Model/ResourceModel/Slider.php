<?php
/**
 * Copyright © 2015 Excellence. All rights reserved.
 */
namespace Excellence\ExcellenceSlider\Model\ResourceModel;

/**
 * Slider resource
 */
class Slider extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('excellenceslider_slider', 'id');
    }

  
}
