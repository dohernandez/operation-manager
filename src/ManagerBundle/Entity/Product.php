<?php

namespace ManagerBundle\Entity;

abstract class Product extends Entity
{
    use Property\Symbol;
    use Property\Alias;
    use Property\Description;
    use Property\Commissions;
    use Property\Market;
}
