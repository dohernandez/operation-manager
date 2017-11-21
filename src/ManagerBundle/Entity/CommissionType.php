<?php

namespace ManagerBundle\Entity;

class CommissionType extends Entity
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
