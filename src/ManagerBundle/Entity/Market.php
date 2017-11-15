<?php

namespace ManagerBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Market
 */
class Market extends Entity
{
    /**
     * @var string
     */
    private $symbol;

    /**
     * @var string
     */
    private $name;

    /**
     * @var ArrayCollection[Stocks]
     */
    private $stocks;
    
    public function __construct()
    {
        $this->stocks = new ArrayCollection();
    }

    /**
     * Set symbol
     *
     * @param string $symbol
     *
     * @return Market
     */
    public function setSymbol(string $symbol)
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
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return ArrayCollection
     */
    public function getStocks(): ArrayCollection
    {
        return $this->stocks;
    }

    /**
     * @param ArrayCollection $stocks
     */
    public function setStocks(ArrayCollection $stocks)
    {
        $this->stocks = $stocks;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return sprintf('%s (%s)', $this->getName(), $this->getSymbol());
    }
}

