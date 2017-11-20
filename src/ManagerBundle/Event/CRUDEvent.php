<?php

namespace ManagerBundle\Event;

use ManagerBundle\Entity\Entity;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\Form\Form;

class CRUDEvent extends Event
{
    /**
     * @var Entity
     */
    private $entity;

    /**
     * @var null|Form
     */
    private $form;

    /**
     * @param Entity $entity
     * @param Form|null $form
     */
    public function __construct(Entity $entity, Form $form = null)
    {
        $this->entity = $entity;
        $this->form = $form;
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

    /**
     * @return null|Form
     */
    public function getForm()
    {
        return $this->form;
    }

    /**
     * @param null|Form $form
     */
    public function setForm($form)
    {
        $this->form = $form;
    }
}
