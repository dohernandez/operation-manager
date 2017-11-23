<?php

namespace ManagerBundle\Entity\Property;

trait Symbol
{
    /**
     * @var string
     */
    protected $symbol;

    /**
     * Set symbol
     *
     * @param string $symbol
     *
     * @return Entity
     */
    public function setSymbol(string $symbol)
    {
        $this->symbol = $symbol;

        return $this;
    }

    /**
     * Get symbol
     *
     * @return string
     */
    public function getSymbol()
    {
        return $this->symbol;
    }
}
