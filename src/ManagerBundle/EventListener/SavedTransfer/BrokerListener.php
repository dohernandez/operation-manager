<?php

namespace ManagerBundle\EventListener\SavedTransfer;

use ManagerBundle\Entity\Transfer;
use ManagerBundle\Event\CRUDEvent;
use ManagerBundle\Repository\BrokerRepository;

class BrokerListener
{
    /**
     * @var BrokerRepository
     */
    private $repository;

    /**
     * @param BrokerRepository $repository
     */
    public function __construct(BrokerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function onSavedTransfer(CRUDEvent $event)
    {
        $transfer = $event->getEntity();

        if ($transfer instanceof Transfer) {
            if ($this->isABrokerTransfer($transfer)) {
                $previousTransferAmount = $this->getPreviousTransferAmount($event);

                if ($this->isBrokerBeneficiary($transfer)) {
                    $broker = $this->repository->findByAccount($transfer->getBeneficiary());

                    $broker->decreaseInvestment($previousTransferAmount)
                        ->increaseInvestment($transfer->getAmount());

                    $broker->decreaseCapital($previousTransferAmount)
                        ->increaseCapital($transfer->getAmount());
                } else {
                    $broker = $this->repository->findByAccount($transfer->getReference());

                    $broker->increaseCapital($previousTransferAmount)
                        ->decreaseCapital($transfer->getAmount());
                }

                $this->repository->save($broker);
            }
        }
    }

    private function isABrokerTransfer(Transfer $transfer)
    {
        return ( $this->isBrokerBeneficiary($transfer) || $this->isBrokerReference($transfer));
    }

    private function getPreviousTransferAmount(CRUDEvent $event)
    {
        return $event->getForm()->get('old_amount')->getData() ?: 0;
    }

    private function isBrokerBeneficiary(Transfer $transfer)
    {
        return ($transfer->getBeneficiary()->getType() == 'broker');
    }

    private function isBrokerReference(Transfer $transfer)
    {
        return ($transfer->getBeneficiary()->getType() == 'broker');
    }
}
