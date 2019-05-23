<?php
namespace Excellence\ExcellenceSlider\Model;
class Slider extends \Magento\Framework\Model\AbstractModel implements \Excellence\ExcellenceSlider\Api\Data\SliderInterface, \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'excellence_excellenceslider_slider';

    protected function _construct()
    {
        $this->_init('Excellence\ExcellenceSlider\Model\ResourceModel\Slider');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
}
