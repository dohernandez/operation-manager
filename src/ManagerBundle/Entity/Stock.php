<?php

namespace ManagerBundle\Entity;

/**
 * Stock
 */
class Stock extends Product
{
    /**
     * @var string
     */
    private $company;

    /**
     * Set company
     *
     * @param string $company
     *
     * @return Stock
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return sprintf('%s (%s)', $this->getCompany(), $this->getSymbol());
    }
}

