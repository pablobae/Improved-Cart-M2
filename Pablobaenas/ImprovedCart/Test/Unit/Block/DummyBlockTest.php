<?php

namespace Pablobaenas\ImprovedCart\Test\Unit\Block;

/**
 * Class DummyBlockTest
 * @package Pablobaenas\ImprovedCart\Test\Unit\Block
 */
class DummyBlockTest extends \PHPUnit\Framework\TestCase
{
    protected $objectManagerHelper;


    protected function setUp()
    {
        $this->objectManagerHelper = new \Magento\Framework\TestFramework\Unit\Helper\ObjectManager($this);
    }

    /**
     * A dummy test for Dummy class
     */
    public function testGetBannerContent()
    {
        $dummyBlock = $this->objectManagerHelper->getObject(
            \Pablobaenas\ImprovedCart\Block\DummyBlock::class
        );
        $this->assertEquals("This is another banner created from a template with block class", $dummyBlock->getBannerContent());
    }

}
