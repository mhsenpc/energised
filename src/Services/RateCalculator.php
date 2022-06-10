<?php


namespace App\Services;


use App\Contracts\CalculatorInterface;

class RateCalculator
{
    private $components = [];

    /**
     * @return array
     */
    public function getComponents(): array
    {
        return $this->components;
    }

    public function addComponent(CalculatorInterface $component): void
    {
        $this->components[] = $component;
    }

    public function getTotalAmount(): float
    {
        $sum = 0;
        foreach ($this->components as $component) {
            $sum += $component->calculate();
        }
        return round($sum , 2);
    }

}