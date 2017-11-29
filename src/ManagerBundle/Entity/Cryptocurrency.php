<?php

namespace ManagerBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class Cryptocurrency extends Product
{
    use Property\Name;

    public function __construct()
    {
        $this->commissions = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }
}
