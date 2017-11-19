<?php

namespace ManagerBundle\Entity;

/**
 * Broker
 */
class Broker extends Entity
{
    use EntityName;
    use EntityType;

    /**
     * @var Account
     */
    private $account;

    /**
     * @return Account
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * @param Account $account
     *
     * @return Account
     */
    public function setAccount(Account $account)
    {
        $this->account = $account;

        return $this;
    }

    public function __toString()
    {
        return $this->getName();
    }
}

