<?php

namespace ManagerBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use ManagerBundle\Contract;

class BrokerMarket extends Entity
{
    use Property\Market;
    use Property\Broker;
    use Property\Commissions;

    public function __construct()
    {
        $this->commissions = new ArrayCollection();
    }

    /**
     * @param Broker $broker
     * @param Market $market
     *
     * @return BrokerMarket
     */
    static public function createFrom(Broker $broker, Market $market): BrokerMarket
    {
        $brokerContract = new static();

        $brokerContract->setMarket($market);
        $brokerContract->setBroker($broker);

        return $brokerContract;
    }

    public function isThisMarket(Market $market)
    {
        return $this->market->getId() === $market->getId();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getMarket();
    }
}
