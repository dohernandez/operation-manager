<?php declare(strict_types=1);

namespace ManagerBundle\Controller;

trait CRUDEntityController
{
    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return $this->entityClass;
    }
    /**
     * @return string
     */
    public function getEntityPrefixRoute(): string
    {
        return $this->prefix_route;
    }
}
