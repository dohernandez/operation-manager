<?php declare(strict_types=1);

namespace ManagerBundle\Entity;

class Commission
{
    use PropertyName;

    /**
     * @var bool
     */
    private $percentage;

    /**
     * @var float
     */
    private $value;

    public function __construct()
    {
        $this->percentage = false;
    }

    /**
     * @return bool
     */
    public function isPercentage(): bool
    {
        return $this->percentage;
    }

    /**
     * @param bool $percentage
     *
     * @return Commission
     */
    public function setPercentage(bool $percentage)
    {
        $this->percentage = $percentage;

        return $this;
    }

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }

    /**
     * @param float $value
     *
     * @return Commission
     */
    public function setValue(float $value)
    {
        $this->value = $value;

        return $this;
    }
}
