<?php

namespace ManagerBundle\Entity\Property;

trait ISO
{
    /**
     * @var string
     */
    protected $iso;

    /**
     * @return string
     */
    public function getIso()
    {
        return $this->iso;
    }

    /**
     * @param string $iso
     *
     * @return Entity
     */
    public function setIso(string $iso)
    {
        $this->iso = $iso;

        return $this;
    }
}
