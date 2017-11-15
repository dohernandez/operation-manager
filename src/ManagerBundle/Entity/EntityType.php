<?php

namespace ManagerBundle\Entity;

class EntityType extends Entity
{
    /**
     * @var string
     */
    protected $type;

    /**
     * Set type
     *
     * @param string $type
     *
     * @return OperationType
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getType();
    }
}
