<?php

namespace ManagerBundle\Entity;

/**
 * OperationType
 */
class OperationType extends Entity
{
    use PropertyType;

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getType();
    }
}

