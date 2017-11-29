<?php

namespace ManagerBundle\Entity\Property;

use ManagerBundle\Entity\Product as ProductEntity;

trait Product
{
    /**
     * @var ProductEntity
     */
    protected $product;

    /**
     * Set product
     *
     * @param ProductEntity $product
     *
     * @return Entity
     */
    public function setProduct(ProductEntity $product)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return ProductEntity
     */
    public function getProduct()
    {
        return $this->product;
    }
}
