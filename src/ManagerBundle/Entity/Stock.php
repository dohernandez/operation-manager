<?php

namespace ManagerBundle\Entity;

/**
 * Stock
 */
class Stock extends Entity
{

    /**
     * @var string
     */
    private $symbol;

    /**
     * @var string
     */
    private $company;

    /**
     * @var string
     */
    private $description;

    /**
     * @var Market
     */
    private $market;

    /**
     * Set symbol
     *
     * @param string $symbol
     *
     * @return Stock
     */
    public function setSymbol($symbol)
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
     * Set description
     *
     * @param string $description
     *
     * @return Stock
     */
    public function setDescription($description)
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

    /**
     * @return Market
     */
    public function getMarket()
    {
        return $this->market;
    }

    /**
     * @param Market $market
     */
    public function setMarket(Market $market)
    {
        $this->market = $market;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return sprintf('%s (%s)', $this->getCompany(), $this->getSymbol());
    }
}

