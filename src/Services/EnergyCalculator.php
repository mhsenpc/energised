<?php


namespace App\Services;


class EnergyCalculator
{
    protected float $amount;
    protected float $pricePerUnit = 0.30;

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