<?php

namespace ManagerBundle\Entity;

/**
 * StockIndex
 */
class StockIndex extends Entity
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $symbol;

    /**
     * @var ArrayCollection[Stock]
     */
    private $stocks;

    /**
     * @var Market
     */
    private $market;

    public function __construct()
    {
        $this->stocks = new ArrayCollection();
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return StockIndex
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set symbol
     *
     * @param string $symbol
     *
     * @return StockIndex
     */
    public function setSymbol($symbol)
    {
        $this->symbol = $symbol;

        return $this;
    }

    /**
     * Get symbol
     *
     * @return string
     */
    public function getSymbol()
    {
        return $this->symbol;
    }

    /**
     * @return ArrayCollection[Stock]
     */
    public function getStocks()
    {
        return $this->stocks;
    }

    /**
     * @param ArrayCollection [Stock] $stocks
     *
     * @return $this
     */
    public function setStocks(ArrayCollection $stocks)
    {
        $this->stocks = $stocks;

        return $this;
    }

    /**
     * @return Market
     */
    public function getMarket()
    {
        return $this->market;
    }

    /**
     * @param Market $market
     *
     * @return $this
     */
    public function setMarket(Market $market)
    {
        $this->market = $market;

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

