<?php

namespace ManagerBundle\Repository;

/**
 * AccountRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AccountRepository extends CRUDRepository
{
    public function findAllWithTypeAccount()
    {
        return $this->findBy([
            'type' => 'account'
        ]);
    }
}
