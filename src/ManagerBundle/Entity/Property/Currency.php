<?php

namespace ManagerBundle\Entity\Property;

trait Currency
{
    /**
     * @var string
     */
    protected $currency;

    /**
     * Set currency
     *
     * @param string $currency
     *
     * @return Entity
     */
    public function setCurrency(string $currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get currency
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }
}
