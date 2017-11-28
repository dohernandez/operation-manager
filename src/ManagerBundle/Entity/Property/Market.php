<?php

namespace ManagerBundle\Entity\Property;

use ManagerBundle\Entity\Market as MarketEntity;

trait Market
{
    /**
     * @var MarketEntity
     */
    protected $market;

    /**
     * Set market
     *
     * @param MarketEntity $market
     *
     * @return Entity
     */
    public function setMarket(MarketEntity $market)
    {
        $this->market = $market;

        return $this;
    }

    /**
     * Get market
     *
     * @return MarketEntity
     */
    public function getMarket()
    {
        return $this->market;
    }
}
