<?php

namespace ManagerBundle\Entity;

class Currency extends Entity
{
    use EntityName;
    use EntityIso;

    public function __toString()
    {
        return $this->getName();
    }
}
