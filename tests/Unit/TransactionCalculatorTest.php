<?php

namespace Tests;

use App\Services\TimeCalculator;
use App\Services\TransactionCalculator;
use PHPUnit\Framework\TestCase;

class TimeCalculatorTest extends TestCase
{
    public function testItWorksWithStandardInput()
    {
        $sut = new TransactionCalculator();
        $sut->setAmount(2);
        $this->assertEquals(
            2,
            $sut->calculate()
        );
    }

    public function testItWorksWithFloatInput()
    {
        $sut = new TransactionCalculator();
        $sut->setAmount(2.5);
        $this->assertEquals(
            2.5,
            $sut->calculate()
        );
    }

    public function testItFailsWithWrongInput()
    {
        $sut = new TransactionCalculator();
        $sut->setAmount(2);
        $this->assertNotEquals(
            10,
            $sut->calculate()
        );
    }
}
