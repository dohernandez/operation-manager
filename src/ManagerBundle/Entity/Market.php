<?php

namespace ManagerBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Market
 */
class Market extends Entity
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var ArrayCollection[StockIndex]
     */
    private $stockIndexes;

    public function __construct()
    {
        $this->stockIndexes = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getStockIndexes(): ArrayCollection
    {
        return $this->stockIndexes;
    }

    /**
     * @param ArrayCollection $stockIndexes
     *
     * @return $this
     */
    public function setStocksIndexes(ArrayCollection $stockIndexes)
    {
        $this->stockIndexes = $stockIndexes;

        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }
}

