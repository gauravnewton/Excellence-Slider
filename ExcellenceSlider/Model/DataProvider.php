<?php
namespace Excellence\ExcellenceSlider\Model;

use Excellence\ExcellenceSlider\Model\ResourceModel\Slider\CollectionFactory;
use Excellence\ExcellenceSlider\Model\Slider;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $contactCollectionFactory
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $formCollectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $formCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }

        $items = $this->collection->getItems();
        $this->loadedData = array();
        /** @var Contact $contact */
        foreach ($items as $contact) {
            // our fieldset is called "contact" or this table so that magento can find its datas:
            $this->loadedData[$contact->getId()]['contact'] = $contact->getData();
        }

        return $this->loadedData;

    }
}