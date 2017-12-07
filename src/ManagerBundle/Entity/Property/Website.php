<?php

namespace ManagerBundle\Entity\Property;

trait Website
{
    /**
     * @var string
     */
    protected $website;

    /**
     * Set website
     *
     * @param string $website
     *
     * @return Entity
     */
    public function setWebsite(string $website)
    {
        $this->website = $website;

        return $this;
    }

    /**
     * Get website
     *
     * @return string
     */
    public function getWebsite()
    {
        return $this->website;
    }
}
