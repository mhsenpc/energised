<?php


namespace App\Services\Calculators;


class TransactionCalculator extends CalculatorAbstract
{
    protected string $name = 'Transaction';

    public function getAmount(): float
    {
        return 1;
    }
}