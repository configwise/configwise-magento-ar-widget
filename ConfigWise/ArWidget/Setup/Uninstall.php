<?php

namespace ConfigWise\ArWidget\Setup;

use Magento\Catalog\Model\Product;
use Magento\Framework\Setup\UninstallInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Eav\Setup\EavSetupFactory;

class Uninstall implements UninstallInterface
{
    private $eavSetupFactory;
    private $blockRepository;

    public function __construct(EavSetupFactory $eavSetupFactory,
                                \Magento\Cms\Api\BlockRepositoryInterface $blockRepository )
    {
        $this->eavSetupFactory = $eavSetupFactory;
        $this->blockRepository = $blockRepository;
    }

    public function uninstall(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $eavSetup = $this->eavSetupFactory->create();
        $eavSetup->removeAttribute(Product::ENTITY, 'product_attribute_use');
        $eavSetup->removeAttribute(Product::ENTITY, 'product_custom_id');
        $eavSetup->removeAttribute(Product::ENTITY, 'channel_id');
        $eavSetup->removeAttribute(Product::ENTITY, 'domain');
        $eavSetup->removeAttribute(Product::ENTITY, 'company_reference_number');
        $blockIdentifier = 'test-block';
        $this->blockRepository->deleteById($blockIdentifier);
        $connection = $setup->getConnection();
        $connection->delete(
            $setup->getTable('widget_instance'),
            ['title LIKE ?' => 'Test Widget']
        );
        $setup->endSetup();
    }
}
