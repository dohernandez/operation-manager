<?php

namespace ManagerBundle\Entity\Property;

use ManagerBundle\Entity\Stock as StockEntity;

trait Stock
{
    /**
     * @var StockEntity
     */
    protected $stock;

    /**
     * Set stock
     *
     * @param StockEntity $stock
     *
     * @return Entity
     */
    public function setStock(StockEntity $stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get stock
     *
     * @return StockEntity
     */
    public function getStock()
    {
        return $this->stock;
    }
}
