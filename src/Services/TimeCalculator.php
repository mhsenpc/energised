<?php


namespace App\Services;


class TimeCalculator
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
     * @return float
     */
    public function getPricePerUnit(): float
    {
        return $this->pricePerUnit;
    }

    /**
     * @param float $pricePerUnit
     */
    public function setPricePerUnit(float $pricePerUnit): void
    {
        $this->pricePerUnit = $pricePerUnit;
    }


    public function calculate(): float
    {
        return $this->amount * $this->pricePerUnit;
    }
}