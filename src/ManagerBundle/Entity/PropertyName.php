<?php

namespace ManagerBundle\Entity;

trait PropertyName
{
    /**
     * @var string
     */
    protected $name;

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Entity
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
