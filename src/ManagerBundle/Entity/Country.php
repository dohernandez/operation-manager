<?php

namespace ManagerBundle\Entity;

/**
 * Country
 */
class Country extends Entity
{
    use Property\Name;
    use Property\ISO;
    use Property\Region;

    /**
     * @var string
     */
    private $niceName;

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
     * @return string
     */
    public function __toString()
    {
        return $this->getNiceName();
    }
}

