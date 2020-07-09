<?php
/**
 * Dummy class to provide data to Banner with template
 *
 * @package Pablobaenas_ImprovedCart
 * @author  Pablo Baenas
 * @created 2020-07-9
 */
namespace Pablobaenas\ImprovedCart\Block;

use Magento\Framework\View\Element\Template;

/**
 * Class DummyBlock
 * @package Pablobaenas\ImprovedCart\Block
 */
class DummyBlock extends Template
{

    /**
     * DummyBlock constructor.
     * @param Template\Context $context
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        array $data = []
    ) {
        parent::__construct(
            $context,
            $data
        );
    }


    /**
     * Provides content to the template.
     * @return string
     */
    public function getBannerContent()
    {
        return "This is another banner created from a template with block class";
    }


}
