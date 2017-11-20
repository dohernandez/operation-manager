<?php

namespace ManagerBundle\Entity;

trait PropertyType
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
     * @return Entity
     */
    public function setType(string $type)
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
}
