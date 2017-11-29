<?php

namespace ManagerBundle\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;

class Operation extends Entity
{
    use Property\Type;
    use Property\Product;

    /**
     * @var ArrayCollection[Trade]
     */
    private $trades;

    /**
     * @var float
     */
    private $goal;

    /**
     * @var float
     */
    private $stop;

    /**
     * @var float
     */
    private $start;

    /**
     * @var float
     */
    private $breakeven;

    /**
     * @var float
     */
    private $earnings;

    /**
     * @var float
     */
    private $commissions;

    /**
     * @var float
     */
    private $benefits;

    /**
     * @var float
     */
    private $taxes;

    /**
     * @var float
     */
    private $benefitsAfterTaxes;

    /**
     * @var DateTime
     */
    private $openedAt;

    /**
     * @var DateTime
     */
    private $closedAt;

    /**
     * @return ArrayCollection
     */
    public function getTrades()
    {
        return $this->trades;
    }

    /**
     * @param ArrayCollection $trades
     *
     * @return Operation
     */
    public function setTrades(ArrayCollection $trades)
    {
        $this->trades = $trades;

        return $this;
    }

    /**
     * @return float
     */
    public function getGoal()
    {
        return $this->goal;
    }

    /**
     * @param float $goal
     *
     * @return Operation
     */
    public function setGoal(float $goal)
    {
        $this->goal = $goal;

        return $this;
    }

    /**
     * @return float
     */
    public function getStop()
    {
        return $this->stop;
    }

    /**
     * @param float $stop
     *
     * @return Operation
     */
    public function setStop(float $stop)
    {
        $this->stop = $stop;

        return $this;
    }

    /**
     * @return float
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @param float $start
     *
     * @return Operation
     */
    public function setStart(float $start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * @return float
     */
    public function getBreakeven()
    {
        return $this->breakeven;
    }

    /**
     * @param float $breakeven
     *
     * @return Operation
     */
    public function setBreakeven(float $breakeven)
    {
        $this->breakeven = $breakeven;

        return $this;
    }

    /**
     * @return float
     */
    public function getEarnings()
    {
        return $this->earnings;
    }

    /**
     * @param float $earnings
     *
     * @return Operation
     */
    public function setEarnings(float $earnings)
    {
        $this->earnings = $earnings;

        return $this;
    }

    /**
     * @return float
     */
    public function getCommissions()
    {
        return $this->commissions;
    }

    /**
     * @param float $commissions
     *
     * @return Operation
     */
    public function setCommissions(float $commissions)
    {
        $this->commissions = $commissions;

        return $this;
    }

    /**
     * @return float
     */
    public function getBenefits()
    {
        return $this->benefits;
    }

    /**
     * @param float $benefits
     *
     * @return Operation
     */
    public function setBenefits(float $benefits)
    {
        $this->benefits = $benefits;

        return $this;
    }

    /**
     * @return float
     */
    public function getTaxes()
    {
        return $this->taxes;
    }

    /**
     * @param float $taxes
     *
     * @return Operation
     */
    public function setTaxes(float $taxes)
    {
        $this->taxes = $taxes;

        return $this;
    }

    /**
     * @return float
     */
    public function getBenefitsAfterTaxes()
    {
        return $this->benefitsAfterTaxes;
    }

    /**
     * @param float $benefitsAfterTaxes
     *
     * @return Operation
     */
    public function setBenefitsAfterTaxes(float $benefitsAfterTaxes)
    {
        $this->benefitsAfterTaxes = $benefitsAfterTaxes;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getOpenedAt()
    {
        return $this->openedAt;
    }

    /**
     * @param DateTime $openedAt
     *
     * @return Operation
     */
    public function setOpenedAt(DateTime $openedAt)
    {
        $this->openedAt = $openedAt;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getClosedAt()
    {
        return $this->closedAt;
    }

    /**
     * @param DateTime $closedAt
     *
     * @return Operation
     */
    public function setClosedAt(DateTime $closedAt)
    {
        $this->closedAt = $closedAt;

        return $this;
    }
}
