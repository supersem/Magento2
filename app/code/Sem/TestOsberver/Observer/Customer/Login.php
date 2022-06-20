<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sem\TestOsberver\Observer\Customer;

class Login implements \Magento\Framework\Event\ObserverInterface
{

    /**
     * Execute observer
     *
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     */

    protected $logger;
    
    public function __construct(
        \Psr\Log\LoggerInterface $logger
        ) {
            $this->logger = $logger;
    }

    public function execute(
        \Magento\Framework\Event\Observer $observer
    ) {
        $customer = $observer->getEvent()->getCustomer();
        $this->logger->notice('SemLOG::ObServer User '.$customer->getName().' email:'.$customer->getEmail(). ' event: logined');
    }
}

