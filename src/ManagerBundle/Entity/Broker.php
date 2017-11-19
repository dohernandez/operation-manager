<?php

namespace ManagerBundle\Entity;

/**
 * Broker
 */
class Broker extends Entity
{
    use EntityName;

    public function __toString()
    {
        return $this->getName();
    }
}

