<?php

namespace ManagerBundle\Entity;

/**
 * Region
 */
class Region extends Entity
{
    use EntityName;

    /**
     * @var ArrayCollection[Country]
     */
    private $countries;

    /**
     * @var ArrayCollection[Market]
     */
    private $markets;

    public function __construct()
    {
        $this->countries = new ArrayCollection();
    }

    /**
     * @return ArrayCollection[Country]
     */
    public function getCountries(): ArrayCollection
    {
        return $this->countries;
    }

    /**
     * @param ArrayCollection[Country] $countries
     *
     * @return Region
     */
    public function setCountries(ArrayCollection $countries)
    {
        $this->countries = $countries;

        return $this;
    }

    /**
     * @return ArrayCollection[Market]
     */
    public function getMarkets()
    {
        return $this->markets;
    }

    /**
     * @param ArrayCollection[Market] $markets
     *
     * @return Region
     */
    public function setMarkets(ArrayCollection $markets)
    {
        $this->markets = $markets;

        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }
}

