<?php

namespace ManagerBundle\Entity;

class Currency
{
    use PropertyName;
    use PropertyISO;

    public function __toString()
    {
        return $this->getIso();
    }
}
