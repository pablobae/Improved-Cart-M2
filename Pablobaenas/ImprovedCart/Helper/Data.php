<?php
/**
 * Provides a helpter to get module's system settings
 *
 * @package Pablobaenas_ImprovedCart
 * @author  Pablo Baenas
 * @created 2020-07-9
 */
namespace Pablobaenas\ImprovedCart\Helper;

/**
 * Dummy class to provide data to Banner with template
 */
class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    /**
     * Module System Configuration path
     */
    const XML_PATH_CONF_GENERAL_ENABLE = 'configuration/general/enable';

    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * Data constructor.
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
        parent::__construct($context);
    }


    /**
     * Check if Redirection feature is enabled
     * @return mixed
     */
    public function isEnabled()
    {
        return (bool) $this->scopeConfig->getValue(self::XML_PATH_CONF_GENERAL_ENABLE, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
}
