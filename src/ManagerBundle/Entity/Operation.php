<?php

namespace ManagerBundle\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;

class Operation extends Entity
{
    use Property\Type;
    use Property\Broker;
    use Property\Product;

    /**
     * @var BrokerMarket
     */
    protected $market;

    /**
     * @var ArrayCollection[Trade]
     */
    private $trades;

    /**
     * @var float
     */
    private $size;

    /**
     * @var float
     */
    private $valor;

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
    private $open;

    /**
     * @var float
     */
    private $ratio;

    /**
     * @var float
     */
    private $order;

    /**
     * @var float
     */
    private $invested;

    /**
     * @var float
     */
    private $risk;

    /**
     * @var float
     */
    private $breakeven;

    /**
     * @var float
     */
    private $earnings;

    /**
     * @var string
     */
    private $closeReason;

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
     * @return BrokerMarket
     */
    public function getMarket()
    {
        return $this->market;
    }

    /**
     * @param BrokerMarket $market
     *
     * @return Operation
     */
    public function setMarket(BrokerMarket $market)
    {
        $this->market = $market;

        return $this;
    }

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
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param float $size
     *
     * @return Operation
     */
    public function setSize(float $size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * @return float
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @param float $valor
     *
     * @return Operation
     */
    public function setValor(float $valor)
    {
        $this->valor = $valor;

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
    public function getOpen()
    {
        return $this->open;
    }

    /**
     * @param float $open
     *
     * @return Operation
     */
    public function setOpen(float $open)
    {
        $this->open = $open;

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
    public function getRatio()
    {
        return $this->ratio;
    }

    /**
     * @param float $ratio
     *
     * @return Operation
     */
    public function setRatio(float $ratio)
    {
        $this->ratio = $ratio;

        return $this;
    }

    /**
     * @return float
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param float $order
     *
     * @return Operation
     */
    public function setOrder(float $order)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * @return float
     */
    public function getInvested()
    {
        return $this->invested;
    }

    /**
     * @param float $invested
     *
     * @return Operation
     */
    public function setInvested(float $invested)
    {
        $this->invested = $invested;

        return $this;
    }

    /**
     * @return float
     */
    public function getRisk()
    {
        return $this->risk;
    }

    /**
     * @param float $risk
     *
     * @return Operation
     */
    public function setRisk(float $risk)
    {
        $this->risk = $risk;

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
     * @return string
     */
    public function getCloseReason()
    {
        return $this->closeReason;
    }

    /**
     * @param string $closeReason
     *
     * @return Operation
     */
    public function setCloseReason(string $closeReason)
    {
        $this->closeReason = $closeReason;

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
