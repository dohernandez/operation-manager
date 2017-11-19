<?php

namespace ManagerBundle\Entity;

trait EntityIBAN
{
    /**
     * @var string
     */
    protected $iban;

    /**
     * Set iban
     *
     * @param string $iban
     *
     * @return Entity
     */
    public function setIban(string $iban)
    {
        $this->iban = $iban;

        return $this;
    }

    /**
     * Get iban
     *
     * @return string
     */
    public function getIban()
    {
        return $this->iban;
    }
}
