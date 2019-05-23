<?php
namespace Excellence\ExcellenceSlider\Api;

use Excellence\ExcellenceSlider\Api\Data\SliderInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

interface SliderRepositoryInterface 
{
    public function save(SliderInterface $page);

    public function getById($id);

    public function getList(SearchCriteriaInterface $criteria);

    public function delete(SliderInterface $page);

    public function deleteById($id);
}
