<?php

namespace ManagerBundle\Entity;

/**
 * OperationType
 */
class OperationType extends Entity
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

