<?php

namespace ManagerBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Stock
 */
class Stock extends Entity
{
    use Property\Symbol;
    use Property\Alias;
    use Property\Description;
    use Property\Commissions;

    /**
     * @var string
     */
    private $company;

    /**
     * @var Market
     */
    private $market;

    public function __construct()
    {
        $this->commissions = new ArrayCollection();
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
     * @return Market
     */
    public function getMarket()
    {
        return $this->market;
    }

    /**
     * @param Market $market
     *
     * @return Stock
     */
    public function setMarket(Market $market)
    {
        $this->market = $market;

        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return sprintf('%s (%s)', $this->getCompany(), $this->getSymbol());
    }
}

