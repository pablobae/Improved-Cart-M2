<?php
/**
 *  Database data installer
 *
 * @package Pablobaenas_ImprovedCart
 * @author  Pablo Baenas
 * @created 2020-07-09
 */
namespace Pablobaenas\ImprovedCart\Setup;

use Magento\Cms\Model\BlockFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;


/**
 * Class InstallData
 * @package Pablobaenas\ImprovedCart\Setup
 */
class InstallData implements InstallDataInterface
{
    /**
     * @var BlockFactory
     */
    private $blockFactory;

    /**
     * InstallData constructor.
     * @param BlockFactory $blockFactory
     */
    public function __construct(BlockFactory $blockFactory)
    {
        $this->blockFactory = $blockFactory;
    }

    /**
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $cmsBlockData = [
            'title' => 'Improved Cart Banner',
            'identifier' => 'improved_cart_banner',
            'content' => "<p>Edit block <strong>Improved Cart Banner</strong> to add your own banner here!!</p>",
            'is_active' => 1,
            'stores' => [0],
            'sort_order' => 0
        ];

        $this->blockFactory->create()->setData($cmsBlockData)->save();
        $setup->endSetup();
    }
}


