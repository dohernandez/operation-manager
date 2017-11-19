<?php

namespace ManagerBundle\Entity;

/**
 * Account
 */
class Account extends Entity
{
    use EntityName;
    use EntityIBAN;

    /**
     * @var Broker
     */
    private $broker;

    /**
     * @return Broker
     */
    public function getBroker()
    {
        return $this->broker;
    }

    /**
     * @param Broker $broker
     *
     * @return Broker
     */
    public function setBroker(Broker $broker)
    {
        $this->broker = $broker;

        return $this;
    }

    public function __toString()
    {
        return sprintf('%s (%s)', $this->getName(), $this->getIban());
    }
}

