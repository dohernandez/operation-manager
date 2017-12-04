<?php

namespace ManagerBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Broker
 */
class Broker extends Platform
{
    use Property\Commissions;

    /**
     * @var Account
     */
    protected $account;

    /**
     * @var ArrayCollection[BrokerMarket]
     */
    protected $markets;

    public function __construct()
    {
        parent::__construct();

        $this->commissions = new ArrayCollection();
        $this->markets = new ArrayCollection();
    }

    /**
     * @return Account
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * @param Account $account
     *
     * @return Broker
     */
    public function setAccount(Account $account)
    {
        $this->account = $account;

        return $this;
    }

    /**
     * Set markets
     *
     * @param ArrayCollection[BrokerMarket] $markets
     *
     * @return Broker
     */
    public function setMarkets(ArrayCollection $markets)
    {
        $this->markets = $markets;

        return $this;
    }

    /**
     * Get markets
     *
     * @return ArrayCollection[BrokerMarket]
     */
    public function getMarkets()
    {
        return $this->markets;
    }

    /**
     * @param BrokerMarket $market
     *
     * @return Broker
     */
    public function addMarket(BrokerMarket $market)
    {
        if (!$this->markets->contains($market)) {
            $this->markets->add($market);
        }

        return $this;
    }

    /**
     * @param BrokerMarket $market
     *
     * @return Broker
     */
    public function removeMarket(BrokerMarket $market)
    {
        $this->markets->removeElement($market);

        return $this;
    }
}

