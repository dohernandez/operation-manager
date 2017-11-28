<?php

namespace ManagerBundle\Entity\Property;

use ManagerBundle\Entity\Region as RegionEntity;

trait Region
{
    /**
     * @var RegionEntity
     */
    protected $region;

    /**
     * Set region
     *
     * @param RegionEntity $region
     *
     * @return Entity
     */
    public function setRegion(RegionEntity $region)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Get region
     *
     * @return RegionEntity
     */
    public function getRegion()
    {
        return $this->region;
    }
}
