<?php

namespace ManagerBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * BrokerType
 */
class BrokerType extends Entity
{
    use PropertyType;

    /**
     * @var ArrayCollection[Broker]
     */
    private $brokers;

    public function __construct()
    {
        $this->brokers = new ArrayCollection();
    }

    /**
     * @return ArrayCollection[Broker]
     */
    public function getBrokers()
    {
        return $this->brokers;
    }

    /**
     * @param ArrayCollection[Broker] $brokers
     *
     * @return BrokerType
     */
    public function setBrokers(ArrayCollection $brokers)
    {
        $this->brokers = $brokers;

        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getType();
    }
}

