<?php

namespace ManagerBundle\Entity;

/**
 * Broker
 */
class Broker extends Entity
{
    use EntityName;

    /**
     * @var BrokerType
     */
    protected $type;

    /**
     * @var Account
     */
    private $account;

    /**
     * Set type
     *
     * @param BrokerType $type
     *
     * @return BrokerType
     */
    public function setType(BrokerType $type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return BrokerType
     */
    public function getType()
    {
        return $this->type;
    }

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

