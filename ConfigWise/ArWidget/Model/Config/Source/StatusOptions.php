<?php
namespace ConfigWise\ArWidget\Model\Config\Source;
 
use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;
 
class StatusOptions extends AbstractSource
{
    /**
     * Get all options
     *
     * @return array
     */
    public function getAllOptions()
    {
        if (null === $this->_options) {
            $this->_options=[
                                ['label' => __('System settings'), 'value' => 2],
                                ['label' => __('Enable'), 'value' => 1],
                                ['label' => __('Disable'), 'value' => 0]
                            ];
        }
        return $this->_options;
    }
}