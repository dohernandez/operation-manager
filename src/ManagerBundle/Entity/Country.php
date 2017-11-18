<?php

namespace ManagerBundle\Entity;

/**
 * Country
 */
class Country extends Entity
{
    use EntityName;

    /**
     * @var string
     */
    private $iso;

    /**
     * @var string
     */
    private $niceName;

    /**
     * @var Region
     */
    private $region;

    /**
     * @return string
     */
    public function getIso()
    {
        return $this->iso;
    }

    /**
     * @param string $iso
     *
     * @return Country
     */
    public function setIso(string $iso)
    {
        $this->iso = $iso;

        return $this;
    }

    /**
     * @return string
     */
    public function getNiceName()
    {
        return $this->niceName;
    }

    /**
     * @param string $niceName
     *
     * @return Country
     */
    public function setNiceName(string $niceName)
    {
        $this->niceName = $niceName;

        return $this;
    }

    /**
     * @param Region $region
     *
     * @return Country
     */
    public function setRegion(Region $region)
    {
        $this->region = $region;

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
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }
}

