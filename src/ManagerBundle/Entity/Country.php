<?php

namespace ManagerBundle\Entity;

/**
 * Country
 */
class Country extends Entity
{
    use Property\Name;
    use Property\ISO;

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
        return $this->getNiceName();
    }
}

