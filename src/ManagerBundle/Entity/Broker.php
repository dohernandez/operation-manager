<?php

namespace ManagerBundle\Entity;

/**
 * Broker
 */
class Broker extends Entity
{
    use EntityName;
    use EntityType;

    public function __toString()
    {
        return $this->getName();
    }
}

