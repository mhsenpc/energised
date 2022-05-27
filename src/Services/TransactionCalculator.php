<?php


namespace App\Services;


class TransactionCalculator
{
    protected float $amount;
    protected float $pricePerUnit = 1;

    public function setAmount(float $amount)
    {
        $this->amount = $amount;
    }

    public function getPricePerUnit()
    {
        return $this->pricePerUnit;
    }

    public function calculate()
    {
        return $this->amount * $this->pricePerUnit;
    }
}