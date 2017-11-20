<?php declare(strict_types=1);

namespace ManagerBundle\Entity;

class Cryptocurrency extends Entity
{
    use EntityName;
    use EntitySymbol;
    use EntityAlias;
    use EntityDescription;

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }
}
