<?php

namespace ManagerBundle\Entity;

class Cryptocurrency extends Product
{
    use Property\Name;

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }
}
