<?php
namespace Pablobaenas\ImprovedCart\Plugin;

/**
 * Class LoginPost define after plugin method for method Execute at
 * \Magento\Customer\Controller\Account\LoginPost
 *
 * @package Pablobaenas\ImprovedCart\Plugin
 */
class LoginPost
{

    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $storeManager;

    /**
     * @var \Magento\Checkout\Model\Session
     */
    protected $checkoutSession;

    /**
     * @var \Magento\Framework\Controller\Result\RedirectFactory
     */
    protected $resultRedirectFactory;

    /**
     * @var \Pablobaenas\ImprovedCart\Helper\Data
     */
    protected $dataHelper;

    /**
     * LoginPost constructor.
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param \Magento\Checkout\Model\Session $checkoutSession
     * @param \Magento\Framework\Controller\Result\RedirectFactory $resultRedirectFactory
     * @param \Pablobaenas\ImprovedCart\Helper\Data $dataHelper
     */
    public function __construct(
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Checkout\Model\Session $checkoutSession,
        \Magento\Framework\Controller\Result\RedirectFactory $resultRedirectFactory,
        \Pablobaenas\ImprovedCart\Helper\Data $dataHelper
    ) {
        $this->storeManager = $storeManager;
        $this->checkoutSession = $checkoutSession;
        $this->resultRedirectFactory = $resultRedirectFactory;
        $this->dataHelper = $dataHelper;
    }

    /**
     * Redirects customer to checkout/cart if his cart contains products
     *
     * @param \Magento\Customer\Controller\Account\LoginPost $subject
     * @param \Magento\Framework\Controller\Result\Redirect $result
     * @return \Magento\Framework\Controller\Result\Redirect
     * @throws \Magento\Framework\Exception\LocalizedException
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function afterExecute(
        \Magento\Customer\Controller\Account\LoginPost $subject,
        \Magento\Framework\Controller\Result\Redirect $result
    ) {
        if ($this->dataHelper->isEnabled()) {
            $quote = $this->checkoutSession->getQuote();
            if ($quote !== null) {
                if (count($quote->getAllItems()) > 0) {
                    $result = $this->resultRedirectFactory->create();
                    $cartURL = $this->storeManager->getStore()->getUrl('checkout/cart');
                    $result->setPath($cartURL);
                }
            }
        }
        return $result;
    }
}
