<?php

namespace Tests;

use App\Services\Calculators\TransactionCalculator;
use PHPUnit\Framework\TestCase;

class TransactionCalculatorTest extends TestCase
{
    public function testItWorksWithStandardInput()
    {
        $sut = new TransactionCalculator();
        $sut->setPricePerUnit(1);
        $this->assertEquals(
            1,
            $sut->calculate()
        );
    }

    public function testItWorksWithFloatInput()
    {
        $sut = new TransactionCalculator();
        $sut->setPricePerUnit(2.5);
        $this->assertEquals(
            2.5,
            $sut->calculate()
        );
    }

    public function testItFailsWithWrongInput()
    {
        $sut = new TransactionCalculator();
        $sut->setPricePerUnit(1);
        $this->assertNotEquals(
            10,
            $sut->calculate()
        );
    }
}
