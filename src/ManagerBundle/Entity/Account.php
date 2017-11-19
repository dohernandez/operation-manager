<?php

namespace ManagerBundle\Entity;

/**
 * Account
 */
class Account extends Entity
{
    use EntityName;

    /**
     * @var string
     */
    private $iban;

    /**
     * Set iban
     *
     * @param string $iban
     *
     * @return Account
     */
    public function setIban($iban)
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

