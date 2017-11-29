<?php

namespace ManagerBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class StockMarket extends Market
{
    /**
     * @var ArrayCollection[Stock]
     */
    private $stocks;

    public function __construct()
    {
        $this->stocks = new ArrayCollection();
    }

    /**
     * @return ArrayCollection[Stock]
     */
    public function getStocks()
    {
        return $this->stocks;
    }

    /**
     * @param ArrayCollection[Stock] $stocks
     *
     * @return StockMarket
     */
    public function setStocks(ArrayCollection $stocks)
    {
        $this->stocks = $stocks;

        return $this;
    }
}
