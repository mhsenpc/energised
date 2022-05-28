<?php

namespace Tests;

use App\Services\TimeCalculator;
use PHPUnit\Framework\TestCase;

class TimeCalculatorTest extends TestCase
{
    public function testItWorksWithStandardInput()
    {
        $sut = new TimeCalculator();
        $sut->setAmount(2);
        $sut->setPricePerUnit(2);
        $this->assertEquals(
            4,
            $sut->calculate()
        );
    }

    public function testItWorksWithFloatInput()
    {
        $sut = new TimeCalculator();
        $sut->setAmount(2.5);
        $sut->setPricePerUnit(2);
        $this->assertEquals(
            5,
            $sut->calculate()
        );
    }

    public function testItFailsWithWrongInput()
    {
        $sut = new TimeCalculator();
        $sut->setAmount(2);
        $sut->setPricePerUnit(2);
        $this->assertNotEquals(
            10,
            $sut->calculate()
        );
    }
}
