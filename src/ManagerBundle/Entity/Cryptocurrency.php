<?php declare(strict_types=1);

namespace ManagerBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class Cryptocurrency extends Entity
{
    use Property\Name;
    use Property\Symbol;
    use Property\Alias;
    use Property\Description;
    use Property\Commissions;

    public function __construct()
    {
        $this->commissions = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }
}
