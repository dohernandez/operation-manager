<?php declare(strict_types=1);

namespace ManagerBundle\Entity;

class Commission extends Entity
{
    use PropertyName;
    use PropertyType;

    /**
     * @var bool
     */
    private $percentage;

    /**
     * @var string
     */
    private $period;

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
    public function isPercentage()
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
     * @return string
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * @param string $period
     *
     * @return Commission
     */
    public function setPeriod(string $period)
    {
        $this->period = $period;

        return $this;
    }

    /**
     * @return float
     */
    public function getValue()
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
