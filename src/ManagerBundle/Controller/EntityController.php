<?php declare(strict_types=1);

namespace ManagerBundle\Controller;

trait EntityController
{
    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return $this->entityClass;
    }
}
