<?php

namespace ManagerBundle\Entity;

trait PropertyCurrency
{
    /**
     * @var Currency
     */
    protected $currency;

    /**
     * Set currency
     *
     * @param Currency $currency
     *
     * @return Entity
     */
    public function setAlias(Currency $currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get currency
     *
     * @return Currency
     */
    public function getAlias()
    {
        return $this->currency;
    }
}
