<?php

namespace ManagerBundle\Entity;

class Currency extends Entity
{
    use PropertyName;
    use PropertyISO;

    public function __toString()
    {
        return $this->getName();
    }
}
