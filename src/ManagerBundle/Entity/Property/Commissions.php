<?php

namespace ManagerBundle\Entity\Property;

use ManagerBundle\Entity\Commission;
use Doctrine\Common\Collections\ArrayCollection;

trait Commissions
{
    /**
     * @var ArrayCollection[Commission]
     */
    protected $commissions;

    /**
     * Set commissions
     *
     * @param ArrayCollection[Commission] $commissions
     *
     * @return Entity
     */
    public function setCommissions(ArrayCollection $commissions)
    {
        $this->commissions = $commissions;

        return $this;
    }

    /**
     * Get commissions
     *
     * @return ArrayCollection[Commission]
     */
    public function getCommissions()
    {
        return $this->commissions;
    }

    /**
     * @param Commission $commission
     *
     * @return Entity
     */
    public function addCommission(Commission $commission)
    {
        if (!$this->commissions->contains($commission)) {
            $this->commissions->add($commission);
        }

        return $this;
    }

    /**
     * @param Commission $commission
     *
     * @return Entity
     */
    public function removeCommission(Commission $commission)
    {
        $this->commissions->removeElement($commission);

        return $this;
    }
}
