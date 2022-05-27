<?php


namespace App\Services;


class TimeCalculator
{
    protected float $amount;
    protected float $pricePerUnit = 2.767;

    public function setAmount(float $amount){
        $this->amount = $amount;
    }

    public function getPricePerUnit(){
        return $this->pricePerUnit;
    }

    public function calculate(){
        return $this->amount * $this->pricePerUnit;
    }
}