<?php

namespace Firebear\ShapeShift\Block\Page;

use Firebear\ShapeShift\Model\TransactionsRepository;

class Success extends \Magento\Framework\View\Element\Template
{
    private $checkoutSession;
    private $transactionRepository;
    private $registry;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Checkout\Model\Session $checkoutSession,
        TransactionsRepository $transactionRepository,
        \Magento\Framework\Registry $coreRegistry
    ) {
        $this->checkoutSession       = $checkoutSession;
        $this->transactionRepository = $transactionRepository;
        $this->registry              = $coreRegistry;
        parent::__construct($context);
    }

    public function getTransactionData()
    {
        $orderId          = $this->registry->registry('last_success_order_id');
        $transactionModel = $this->transactionRepository->getByOrderId($orderId);
        var_dump($orderId);
        return $transactionModel;
    }
}
