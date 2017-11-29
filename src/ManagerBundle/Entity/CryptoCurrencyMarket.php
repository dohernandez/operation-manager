<?php

namespace ManagerBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class CryptoCurrencyMarket extends Market
{
    /**
     * @var ArrayCollection[Cryptocurrency]
     */
    private $cryptocurrencies;

    public function __construct()
    {
        $this->cryptocurrencies = new ArrayCollection();
    }

    /**
     * @return ArrayCollection[Cryptocurrency]
     */
    public function getCryptocurrencies()
    {
        return $this->cryptocurrencies;
    }

    /**
     * @param ArrayCollection[Cryptocurrency] $cryptocurrencies
     *
     * @return CryptoCurrencyMarket
     */
    public function setCryptocurrencies(ArrayCollection $cryptocurrencies)
    {
        $this->cryptocurrencies = $cryptocurrencies;

        return $this;
    }
}
