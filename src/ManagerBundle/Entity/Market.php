<?php

namespace ManagerBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

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
    protected $country;

    /**
     * @var Region
     */
    protected $region;

    /**
     * @var ArrayCollection[Platform]
     */
    protected $platforms;

    public function __construct()
    {
        $this->platforms = new ArrayCollection();
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
     * Set markets
     *
     * @param ArrayCollection[Platform] $platforms
     *
     * @return Market
     */
    public function setPlatforms(ArrayCollection $platforms)
    {
        $this->platforms = $platforms;

        return $this;
    }

    /**
     * Get platforms
     *
     * @return ArrayCollection[Platform]
     */
    public function getPlatforms()
    {
        return $this->platforms;
    }

    /**
     * @param Platform $platform
     *
     * @return Market
     */
    public function addPlatform(Platform $platform)
    {
        if (!$this->platforms->contains($platform)) {
            $this->platforms->add($platform);
        }

        return $this;
    }

    /**
     * @param Platform $platform
     *
     * @return Market
     */
    public function removedPlatform(Platform $platform)
    {
        $this->platforms->removeElement($platform);

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
