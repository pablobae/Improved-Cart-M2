<?php

namespace Pablobaenas\ImprovedCart\Test\Unit\Helper;


/**
 * Class DataTest
 * @package Pablobaenas\ImprovedCart\Test\Unit\Helper
 */
class DataTest extends \PHPUnit\Framework\TestCase
{
    /**
     * Data Helper
     *
     * @var \Pablobaenas\ImprovedCart\Helper\Data
     */
    protected $helper;


    /**
     * Scope config mock
     *
     * @var \Magento\Framework\App\Config\ScopeConfigInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $scopeConfigMock;

    /**
     * @var \Magento\Framework\TestFramework\Unit\Helper\ObjectManager
     */
    protected $objectManagerHelper;


    protected function setUp()
    {
        $this->objectManagerHelper = new \Magento\Framework\TestFramework\Unit\Helper\ObjectManager($this);
        $className = \Pablobaenas\ImprovedCart\Helper\Data::class;
        $arguments = $this->objectManagerHelper->getConstructArguments($className);
        /**
         * @var \Magento\Framework\App\Helper\Context $context
         */
        $context = $arguments['context'];
        $this->scopeConfigMock = $context->getScopeConfig();
        $this->helper = $this->objectManagerHelper->getObject($className, $arguments);
    }


    /**
     * Test the value returned by isEnabled() when config is set to Enabled.
     */
    public function testIsEnabled()
    {
        $this->scopeConfigMock->expects($this->once())
            ->method('getValue')
            ->willReturn('1');

        $this->assertEquals(true, $this->helper->isEnabled());
    }

    /**
     * Test the value returned by isEnabled() when config is set to Disabled.
     */
    public function testIsNotEnabled()
    {
        $this->scopeConfigMock->expects($this->once())
            ->method('getValue')
            ->willReturn('0');

        $this->assertEquals(false, $this->helper->isEnabled());
    }
}
