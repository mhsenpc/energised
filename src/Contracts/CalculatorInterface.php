<?php

namespace App\Contracts;

interface CalculatorInterface
{
    public function getName(): string;

    public function calculate(): float;
}