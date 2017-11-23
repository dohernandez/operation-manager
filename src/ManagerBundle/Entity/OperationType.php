<?php

namespace ManagerBundle\Entity;

/**
 * OperationType
 */
class OperationType extends Entity
{
    use Property\Type;

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getType();
    }
}

