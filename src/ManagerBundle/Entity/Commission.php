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
    private $frequency;

    /**
     * @var string
     */
    private $applied;

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
    public function getFrequency()
    {
        return $this->frequency;
    }

    /**
     * @param string $frequency
     *
     * @return Commission
     */
    public function setFrequency(string $frequency)
    {
        $this->frequency = $frequency;

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

    /**
     * @return string
     */
    public function getApplied()
    {
        return $this->applied;
    }

    /**
     * @param string $applied
     *
     * @return Commission
     */
    public function setApplied(string $applied)
    {
        $this->applied = $applied;

        return $this;
    }
}
