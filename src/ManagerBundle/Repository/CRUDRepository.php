<?php

namespace ManagerBundle\Repository;

use ManagerBundle\Entity\Entity;

class CRUDRepository extends Repository
{
    /**
     * @param Entity $entity
     */
    public function save(Entity $entity): void
    {
        $em = $this->getEntityManager();
        $em->persist($entity);
        $em->flush();
    }

    /**
     * @param Entity $entity
     */
    public function remove(Entity $entity): void
    {
        $em = $this->getEntityManager();
        $em->remove($entity);
        $em->flush();
    }
}
