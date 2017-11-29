<?php

namespace ManagerBundle\Entity;

/**
 * Trade
 */
abstract class Trade extends Entity
{
    use Property\Type;
    use Property\Product;

    /**
     * @var Operation
     */
    private $operation;

    /**
     * @var DateTime
     */
    private $tradedAt;

    /**
     * @var float
     */
    private $price;

    /**
     * @var float
     */
    private $order;

    /**
     * @var float
     */
    private $glide;

    /**
     * @var float
     */
    private $commissions;

    /**
     * @var float
     */
    private $expenses;

    /**
     * @return Operation
     */
    public function getOperation()
    {
        return $this->operation;
    }

    /**
     * @param Operation $operation
     *
     * @return Trade
     */
    public function setOperation(Operation $operation)
    {
        $this->operation = $operation;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getTradedAt()
    {
        return $this->tradedAt;
    }

    /**
     * @param DateTime $tradedAt
     *
     * @return Trade
     */
    public function setTradedAt(DateTime $tradedAt)
    {
        $this->tradedAt = $tradedAt;

        return $this;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param float $price
     *
     * @return Trade
     */
    public function setPrice(float $price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return float
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param float $order
     *
     * @return Trade
     */
    public function setOrder(float $order)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * @return float
     */
    public function getGlide()
    {
        return $this->glide;
    }

    /**
     * @param float $glide
     *
     * @return Trade
     */
    public function setGlide(float $glide)
    {
        $this->glide = $glide;

        return $this;
    }

    /**
     * @return float
     */
    public function getCommissions()
    {
        return $this->commissions;
    }

    /**
     * @param float $commissions
     *
     * @return Trade
     */
    public function setCommissions(float $commissions)
    {
        $this->commissions = $commissions;

        return $this;
    }

    /**
     * @param float $commission
     *
     * @return Trade
     */
    public function addCommission(float $commission)
    {
        $this->commissions += $commission;

        return $this;
    }

    /**
     * @return float
     */
    public function getExpenses()
    {
        return $this->expenses;
    }

    /**
     * @param float $expenses
     *
     * @return Trade
     */
    public function setExpenses(float $expenses)
    {
        $this->expenses = $expenses;

        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getStock();
    }
}
