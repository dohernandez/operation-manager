<?php

namespace ManagerBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Broker
 */
class Broker extends Entity
{
    use PropertyName;

    /**
     * @var BrokerType
     */
    protected $type;

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
     * @var ArrayCollection[CommissionType]
     */
    private $commissionTypes;

    public function __construct()
    {
        $this->investment = 0;
        $this->capital = 0;
        $this->commissionTypes = new ArrayCollection();
    }

    /**
     * Set type
     *
     * @param BrokerType $type
     *
     * @return Broker
     */
    public function setType(BrokerType $type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return BrokerType
     */
    public function getType()
    {
        return $this->type;
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
    }

    /**
     * @return ArrayCollection[CommissionType]
     */
    public function getCommissionTypes()
    {
        return $this->commissionTypes;
    }

    /**
     * @param ArrayCollection[CommissionType] $commissionTypes
     *
     * @return Broker
     */
    public function setCommissionTypes(ArrayCollection $commissionTypes)
    {
        $this->commissionTypes = $commissionTypes;

        return $this;
    }

    public function __toString()
    {
        return $this->getName();
    }
}

