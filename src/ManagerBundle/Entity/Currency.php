<?php

namespace ManagerBundle\Entity;

class Currency
{
    use Property\Name;
    use Property\ISO;

    public function __toString()
    {
        return $this->getIso();
    }
}
