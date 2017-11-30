<?php

namespace ManagerBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class BrokerMarket extends Entity
{
    use Property\Market;
    use Property\Broker;
    use Property\Commissions;

    private $products;

    public function __construct()
    {
        $this->commissions = new ArrayCollection();
        $this->products = new ArrayCollection();
    }

    /**
     * @param Market $market
     *
     * @return BrokerMarket
     */
    static public function createFromMarket(Market $market): BrokerMarket
    {
        $brokerContract = new static();

        $brokerContract->setProducts($market);

        return $brokerContract;
    }

    /**
     * @return ArrayCollection[Product]
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param ArrayCollection [Product] $products
     *
     * @return BrokerMarket
     */
    public function setProducts(ArrayCollection $products)
    {
        $this->products = $products;

        return $this;
    }

    /**
     * @param Product $product
     *
     * @return BrokerMarket
     */
    public function addProduct(Product $product)
    {
        if (!$this->products->contains($product)) {
            $this->products->add($product);
        }

        return $this;
    }

    /**
     * @param Product $product
     *
     * @return BrokerMarket
     */
    public function removeProduct(Product $product)
    {
        $this->products->removeElement($product);

        return $this;
    }

    public function equals(Market $market)
    {
        return $this->market->getId() === $market->getId();
    }
}
