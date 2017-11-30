<?php

namespace ManagerBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Broker
 */
class Broker extends Entity
{
    use Property\Name;
    use Property\Type;
    use Property\Commissions;

    /**
     * @var Account
     */
    private $account;

    /**
     * @var float
     */
    private $investment;

    /**
     * @var float
     */
    private $capital;

    /**
     * @var ArrayCollection[BrokerMarket]
     */
    protected $markets;

    public function __construct()
    {
        $this->investment = 0;
        $this->capital = 0;
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
     * @return float
     */
    public function getInvestment()
    {
        return $this->investment;
    }

    /**
     * @param float $investment
     *
     * @return Broker
     */
    public function setInvestment(float $investment)
    {
        $this->investment = $investment;

        return $this;
    }

    /**
     * @param float $investment
     *
     * @return Broker
     */
    public function increaseInvestment(float $investment)
    {
        $this->investment += $investment;

        return $this;
    }

    /**
     * @param float $investment
     *
     * @return Broker
     */
    public function decreaseInvestment(float $investment)
    {
        $this->investment -= $investment;

        return $this;
    }

    /**
     * @return float
     */
    public function getCapital()
    {
        return $this->capital;
    }

    /**
     * @param float $capital
     *
     * @return Broker
     */
    public function setCapital(float $capital)
    {
        $this->capital = $capital;

        return $this;
    }

    /**
     * @param float $capital
     *
     * @return Broker
     */
    public function increaseCapital(float $capital)
    {
        $this->capital += $capital;

        return $this;
    }

    /**
     * @param float $capital
     *
     * @return Broker
     */
    public function decreaseCapital(float $capital)
    {
        $this->capital -= $capital;

        return $this;
    }/**
 * Set markets
 *
 * @param ArrayCollection[BrokerMarket] $markets
 *
 * @return Entity
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
     * @param Market $market
     *
     * @return Entity
     */
    public function addMarket(Market $market)
    {
        $brokerMarket = BrokerMarket::createFromMarket($market);

        if (!$this->markets->contains($brokerMarket)) {
            $this->markets->add($brokerMarket);
        }

        return $this;
    }

    /**
     * @param Market $market
     *
     * @return Entity
     */
    public function removeMarket(Market $market)
    {
        $remove = null;

        foreach ($this->markets as $brokerMarket) {
            if ($brokerMarket->equals($market)) {
                $remove = $brokerMarket;

                break;
            }
        }

        if (!empty($remove)) {
            $this->markets->removeElement($remove);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getName();
    }
}

