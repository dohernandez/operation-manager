<?php

namespace ManagerBundle\Event;

use ManagerBundle\Entity\Entity;
use Symfony\Component\EventDispatcher\Event;

class CRUDEvent extends Event
{
    /**
     * @var Entity
     */
    private $entity;

    /**
     * @param Entity $entity
     */
    public function __construct(Entity $entity)
    {
        $this->entity = $entity;
    }

    /**
     * @return Entity
     */
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * @param Entity $entity
     */
    public function setEntity(Entity $entity)
    {
        $this->entity = $entity;
    }
}
