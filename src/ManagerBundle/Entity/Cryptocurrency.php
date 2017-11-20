<?php declare(strict_types=1);

namespace ManagerBundle\Entity;

class Cryptocurrency extends Entity
{
    use PropertyName;
    use PropertySymbol;
    use PropertyAlias;
    use PropertyDescription;

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }
}
