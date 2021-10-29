<?php
namespace ConfigWise\ArWidget\Model\Config;

use Magento\Framework\Option\ArrayInterface;
use Magento\Catalog\Model\ResourceModel\Product\Attribute\CollectionFactory;

class Productlist implements ArrayInterface
{
    protected $config;
    protected $_collectionFactory;
    public function __construct(
        \Magento\Catalog\Model\Config $config,
         \Magento\Catalog\Model\ResourceModel\Eav\Attribute $attributeFactory,
         CollectionFactory $collectionFactory
    ) 
    {
        $this->config=$config;
         $this->_attributeFactory = $attributeFactory;
         $this->_collectionFactory = $collectionFactory;
    }
    public function toOptionArray()
    {
        $attributes=$this->config->getAttributesUsedInProductListing();
        $attributeInfo = $this->_attributeFactory->getCollection();

        $collection = $this->_collectionFactory->create();

    

        $attributesArray = array();
        $attributesArray = array(
            array(
            'label' => __('Please Select'),
            'value' => ''
        )

        );
        $input_type_arr = array('select', 'multiselect'); 
        foreach($collection as  $attribute){    
                $attributesArray[] = array('value' => $attribute->getAttributeCode(), 'label' => $attribute->getFrontendLabel());

        }
        return $attributesArray;
    }
}