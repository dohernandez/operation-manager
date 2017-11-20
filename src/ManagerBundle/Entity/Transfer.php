<?php

namespace ManagerBundle\Entity;

use DateTime;

/**
 * Transfer
 */
class Transfer extends Entity
{
    use PropertyCurrency;

    /**
     * @var DateTime
     */
    private $transferredAt;

    /**
     * @var float
     */
    private $amount;

    /**
     * @var Account
     */
    private $beneficiary;

    /**
     * @var Account
     */
    private $reference;

    /**
     * Set transferredAt
     *
     * @param DateTime $transferredAt
     *
     * @return Transfer
     */
    public function setTransferredAt(DateTime $transferredAt)
    {
        $this->transferredAt = $transferredAt;

        return $this;
    }

    /**
     * Get transferredAt
     *
     * @return DateTime
     */
    public function getTransferredAt()
    {
        return $this->transferredAt;
    }

    /**
     * Set amount
     *
     * @param float $amount
     *
     * @return Transfer
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return Account
     */
    public function getBeneficiary()
    {
        return $this->beneficiary;
    }

    /**
     * @param Account $beneficiary
     *
     * @return Transfer
     */
    public function setBeneficiary(Account $beneficiary)
    {
        $this->beneficiary = $beneficiary;

        return $this;
    }

    /**
     * @return Account
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param Account $reference
     *
     * @return Transfer
     */
    public function setReference(Account $reference)
    {
        $this->reference = $reference;

        return $this;
    }
}

