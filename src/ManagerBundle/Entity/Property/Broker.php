<?php

namespace ManagerBundle\Entity\Property;

use ManagerBundle\Entity\Broker as BrokerEntity;

trait Broker
{
    /**
     * @var BrokerEntity
     */
    protected $broker;

    /**
     * Set broker
     *
     * @param BrokerEntity $broker
     *
     * @return Entity
     */
    public function setBroker(BrokerEntity $broker)
    {
        $this->broker = $broker;

        return $this;
    }

    /**
     * Get broker
     *
     * @return BrokerEntity
     */
    public function getBroker()
    {
        return $this->broker;
    }
}
