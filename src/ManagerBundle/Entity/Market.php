<?php

namespace ManagerBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Market
 */
class Market extends Entity
{
    use Property\Name;
    use Property\Symbol;
    use Property\Alias;
    use Property\Commissions;

    /**
     * @var Country
     */
    private $country;

    /**
     * @var Region
     */
    private $region;

    /**
     * @var ArrayCollection[Stock]
     */
    private $stocks;
    
    public function __construct()
    {
        $this->stocks = new ArrayCollection();
        $this->commissions = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param Country $country
     *
     * @return Market
     */
    public function setCountry(Country $country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return Region
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param Region $region
     *
     * @return Market
     */
    public function setRegion(Region $region)
    {
        $this->region = $region;

        return $this;
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
     * @return Market
     */
    public function setStocks(ArrayCollection $stocks)
    {
        $this->stocks = $stocks;

        return $this;
    }

    /**
     * @param MarketCommission $commission
     *
     * @return Market
     */
    public function addMarketCommission(MarketCommission $commission)
    {
        return $this->addCommission($commission);
    }

    /**
     * @param MarketCommission $commission
     *
     * @return Market
     */
    public function removeMarketCommission(MarketCommission $commission)
    {
        return $this->removeCommission($commission);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return sprintf('%s (%s)', $this->getName(), $this->getSymbol());
    }
}

