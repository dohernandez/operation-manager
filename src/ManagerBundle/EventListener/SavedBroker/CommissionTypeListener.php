<?php

namespace ManagerBundle\EventListener\SavedBroker;

use ManagerBundle\Entity\Broker;
use ManagerBundle\Entity\CommissionType;
use ManagerBundle\Event\CRUDEvent;
use ManagerBundle\Repository\CommissionTypeRepository;

class CommissionTypeListener
{
    /**
     * @var BrokerRepository
     */
    private $repository;

    /**
     * @param CommissionTypeRepository $repository
     */
    public function __construct(CommissionTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function onSavedBroker(CRUDEvent $event)
    {
        $broker = $event->getEntity();

        if ($broker instanceof Broker) {
            $commissionTypes = $broker->getCommissionTypes();

            dump($commissionTypes);die();
        }
    }
}
