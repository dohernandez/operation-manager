<?php declare(strict_types=1);

namespace ManagerBundle\Entity;

class Cryptocurrency extends Entity
{
    use Property\Name;
    use Property\Symbol;
    use Property\Alias;
    use Property\Description;

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }
}
