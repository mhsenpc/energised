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
     * @param float|int $pricePerUnit
     */
    public function setPricePerUnit($pricePerUnit): void
    {
        $this->pricePerUnit = $pricePerUnit;
    }

    public function calculate(): float
    {
        return $this->getAmount() * $this->getPricePerUnit();
    }
}