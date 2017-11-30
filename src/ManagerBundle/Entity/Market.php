<?php

namespace ManagerBundle\Entity;

/**
 * Market
 */
abstract class Market extends Entity
{
    use Property\Name;
    use Property\Symbol;
    use Property\Alias;

    /**
     * @var Country
     */
    private $country;

    /**
     * @var Region
     */
    private $region;

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
     * @return string
     */
    public function __toString()
    {
        return sprintf('%s (%s)', $this->getName(), $this->getSymbol());
    }
}

