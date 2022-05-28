<?php


namespace App\Services;


class TransactionCalculator
{
    protected float $amount;
    protected float $pricePerUnit;

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     */
    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return float|int
     */
    public function getPricePerUnit(): float
    {
        return $this->pricePerUnit;
    }

    /**
     * @param float|int $pricePerUnit
     */
    public function setPricePerUnit($pricePerUnit): void
    {
        $this->pricePerUnit = $pricePerUnit;
    }

    public function calculate()
    {
        return $this->amount * $this->pricePerUnit;
    }
}