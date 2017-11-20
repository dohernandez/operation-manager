<?php

namespace ManagerBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Account
 */
class Account extends Entity
{
    use EntityName;
    use EntityIBAN;
    use EntityType;

    /**
     * @var ArrayCollection[Transfer]
     */
    private $entrances;

    /**
     * @var ArrayCollection[Transfer]
     */
    private $exits;

    public function __construct()
    {
        $this->entrances = new ArrayCollection();
        $this->exits = new ArrayCollection();
    }

    /**
     * @return ArrayCollection
     */
    public function getEntrances(): ArrayCollection
    {
        return $this->entrances;
    }

    /**
     * @param ArrayCollection $entrances
     *
     * @return Account
     */
    public function setEntrances(ArrayCollection $entrances)
    {
        $this->entrances = $entrances;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getExits(): ArrayCollection
    {
        return $this->exits;
    }

    /**
     * @param ArrayCollection $exits
     *
     * @return Account
     */
    public function setExits(ArrayCollection $exits)
    {
        $this->exits = $exits;

        return $this;
    }

    public function __toString()
    {
        return sprintf('%s (%s)', $this->getName(), $this->getIban());
    }
}

