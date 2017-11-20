<?php

namespace ManagerBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Market
 */
class Market extends Entity
{
    use PropertyName;
    use PropertySymbol;
    use PropertyAlias;

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
     * @return string
     */
    public function __toString()
    {
        return sprintf('%s (%s)', $this->getName(), $this->getSymbol());
    }
}

