<?php
namespace Sem\Helloworld\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\App\Area;

class CustomerLogin implements ObserverInterface
{
    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $_storeManager;

    /**
     * @var \Magento\Framework\Mail\Template\TransportBuilder
     */
    private $transportBuilder;

    /**
     * @param \Magento\Framework\Mail\Template\TransportBuilder $transportBuilder
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     */
    public function __construct(
        \Magento\Framework\Mail\Template\TransportBuilder $transportBuilder,
        \Magento\Store\Model\StoreManagerInterface $storeManager
    ) {
        $this->transportBuilder = $transportBuilder;
        $this->_storeManager = $storeManager;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $customer = $observer->getEvent()->getCustomer();
        $this->sendEmail($customer);
    }

    public function sendEmail($customer)
    {
        $senderInfo = [
            'name' => $customer->getName(),
            'email' => $customer->getEmail(),
        ];

        $recieverEmail = 'xsupertestx@gmail.com';
        $emailTemplateId = 1;

        $emailTemplateVariables = [];
        $emailTempVariables['name'] = $customer->getName();

        $postObject = new \Magento\Framework\DataObject();
        $postObject->setData($emailTempVariables);
        
        $transport = $this->transportBuilder->setTemplateIdentifier($emailTemplateId)
                    ->setTemplateOptions(
                        [
                            'area' => Area::AREA_FRONTEND,
                            'store' => $this->_storeManager->getStore()->getId()
                        ]
                    )
                    ->setTemplateVars(['data' => $postObject])
                    ->setFrom($senderInfo)
                    ->addTo($recieverEmail)
                    ->setReplyTo($recieverEmail)
                    ->getTransport();
        $transport->sendMessage();
    }
}