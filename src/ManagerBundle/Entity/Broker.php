<?php

namespace ManagerBundle\Entity;

/**
 * Broker
 */
class Broker extends Entity
{
    use EntityName;

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

    public function __toString()
    {
        return $this->getName();
    }
}

