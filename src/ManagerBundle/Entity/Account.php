<?php

namespace ManagerBundle\Entity;

/**
 * Account
 */
class Account extends Entity
{
    use EntityName;
    use EntityIBAN;
    use EntityType;

    public function __toString()
    {
        return sprintf('%s (%s)', $this->getName(), $this->getIban());
    }
}

