<?php

namespace ManagerBundle\Entity;

trait EntityDescription
{
    /**
     * @var string
     */
    protected $description;

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Entity
     */
    public function setDescription(string $description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}
