<?php

namespace ManagerBundle\Entity;

trait PropertyCommissions
{
    /**
     * @var float
     */
    protected $commissions;

    /**
     * Set commissions
     *
     * @param float $commissions
     *
     * @return Entity
     */
    public function setCommissions(float $commissions)
    {
        $this->commissions = $commissions;

        return $this;
    }

    /**
     * Get commissions
     *
     * @return float
     */
    public function getCommissions()
    {
        return $this->commissions;
    }
}
