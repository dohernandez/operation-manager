<?php

namespace ManagerBundle\Entity\Property;

use ManagerBundle\Entity\Market;

trait Markets
{
    /**
     * @var Market
     */
    protected $markets;

    /**
     * Set markets
     *
     * @param Market $markets
     *
     * @return Entity
     */
    public function setMarkets(Market $markets)
    {
        $this->markets = $markets;

        return $this;
    }

    /**
     * Get markets
     *
     * @return Market
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
        if (!$this->markets->contains($market)) {
            $this->markets->add($market);
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
        $this->markets->removeElement($market);

        return $this;
    }
}
