<?php

namespace ManagerBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use ManagerBundle\Contract;

/**
 * Market
 */
abstract class Market extends Entity implements Contract\Market
{
    use Property\Name;
    use Property\Symbol;
    use Property\Alias;

    /**
     * @var Country
     */
    private $country;

    /**
     * @var Region
     */
    private $region;

    /**
     * @var ArrayCollection[BrokerMarket]
     */
    protected $brokers;

    public function __construct()
    {
        $this->brokers = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param Country $country
     *
     * @return Market
     */
    public function setCountry(Country $country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return Region
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param Region $region
     *
     * @return Market
     */
    public function setRegion(Region $region)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Set markets
     *
     * @param ArrayCollection[BrokerMarket] $brokers
     *
     * @return Market
     */
    public function setBrokers(ArrayCollection $brokers)
    {
        $this->brokers = $brokers;

        return $this;
    }

    /**
     * Get brokers
     *
     * @return ArrayCollection[BrokerMarket]
     */
    public function getBrokers()
    {
        return $this->brokers;
    }

    /**
     * @param BrokerMarket $broker
     *
     * @return Market
     */
    public function addBroker(BrokerMarket $broker)
    {
        if (!$this->brokers->contains($broker)) {
            $this->brokers->add($broker);
        }

        return $this;
    }

    /**
     * @param BrokerMarket $broker
     *
     * @return Market
     */
    public function removedBroker(BrokerMarket $broker)
    {
        $this->brokers->removeElement($broker);

        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return sprintf('%s (%s)', $this->getName(), $this->getSymbol());
    }
}

