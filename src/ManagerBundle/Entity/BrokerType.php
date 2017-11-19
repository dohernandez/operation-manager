<?php

namespace ManagerBundle\Entity;

/**
 * BrokerType
 */
class BrokerType extends Entity
{
    use EntityType;

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getType();
    }
}

