<?php

namespace ManagerBundle\Entity;

trait EntityAlias
{
    /**
     * @var string
     */
    protected $alias;

    /**
     * Set alias
     *
     * @param string $alias
     *
     * @return Entity
     */
    public function setAlias(string $alias)
    {
        $this->alias = $alias;

        return $this;
    }

    /**
     * Get alias
     *
     * @return string
     */
    public function getAlias()
    {
        return $this->alias;
    }
}
