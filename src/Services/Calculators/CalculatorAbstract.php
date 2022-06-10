<?php


namespace App\Services\Calculators;


use App\Contracts\CalculatorInterface;
use App\Exceptions\NotImplementedException;

class CalculatorAbstract implements CalculatorInterface
{
    protected float $pricePerUnit;
    protected string $name;

    /**
     * @return float
     */
    public function getAmount(): float
    {
        throw new NotImplementedException();
    }


    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return float|int
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
        $result =  $this->getAmount() * $this->getPricePerUnit();
        return $this->formatNumber($result);
    }

    protected function formatNumber(float $number){
        $fig = pow(10, 3);
        return (ceil($number * $fig) / $fig);
    }
}