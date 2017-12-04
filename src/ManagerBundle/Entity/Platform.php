<?php

namespace ManagerBundle\Entity;

abstract class Platform extends Entity
{
    use Property\Name;
    use Property\Type;

    /**
     * @var float
     */
    protected $investment;

    /**
     * @var float
     */
    protected $capital;

    public function __construct()
    {
        $this->investment = 0;
        $this->capital = 0;
    }

    /**
     * @return float
     */
    public function getInvestment()
    {
        return $this->investment;
    }

    /**
     * @param float $investment
     *
     * @return Platform
     */
    public function setInvestment(float $investment)
    {
        $this->investment = $investment;

        return $this;
    }

    /**
     * @param float $investment
     *
     * @return Platform
     */
    public function increaseInvestment(float $investment)
    {
        $this->investment += $investment;

        return $this;
    }

    /**
     * @param float $investment
     *
     * @return Platform
     */
    public function decreaseInvestment(float $investment)
    {
        $this->investment -= $investment;

        return $this;
    }

    /**
     * @return float
     */
    public function getCapital()
    {
        return $this->capital;
    }

    /**
     * @param float $capital
     *
     * @return Platform
     */
    public function setCapital(float $capital)
    {
        $this->capital = $capital;

        return $this;
    }

    /**
     * @param float $capital
     *
     * @return Platform
     */
    public function increaseCapital(float $capital)
    {
        $this->capital += $capital;

        return $this;
    }

    /**
     * @param float $capital
     *
     * @return Platform
     */
    public function decreaseCapital(float $capital)
    {
        $this->capital -= $capital;

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
