<?php

namespace ManagerBundle\Entity;

/**
 * Transfer
 */
class Transfer extends Entity
{
    /**
     * @var datetime_immutable
     */
    private $date;

    /**
     * @var float
     */
    private $amount;

    /**
     * Set date
     *
     * @param datetime_immutable $date
     *
     * @return Transfer
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return datetime_immutable
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set amount
     *
     * @param float $amount
     *
     * @return Transfer
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }
}

