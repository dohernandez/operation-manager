<?php

namespace ManagerBundle\Entity;

class CommissionType extends Entity
{
    use PropertyType;

    /**
     * @var Broker
     */
    private $broker;

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getType();
    }

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
     * @return CommissionType
     */
    public function setBroker(Broker $broker)
    {
        $this->broker = $broker;

        return $this;
    }
}
