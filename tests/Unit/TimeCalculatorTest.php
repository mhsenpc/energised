<?php

namespace Tests;

use App\Services\TimeCalculator;
use PHPUnit\Framework\TestCase;

class TimeCalculatorTest extends TestCase
{
    public function testItWorksWithStandardInput(){
        $sut = new TimeCalculator();
        $sut->setAmount(2);
        $this->assertEquals(
            5.534,
            $sut->calculate()
        );
    }

    public function testItWorksWithFloatInput(){
        $sut = new TimeCalculator();
        $sut->setAmount(2.5);
        $this->assertEquals(
            6.9175,
            $sut->calculate()
        );
    }

    public function testItFailsWithWrongInput(){
        $sut = new TimeCalculator();
        $sut->setAmount(2);
        $this->assertNotEquals(
            10,
            $sut->calculate()
        );
    }
}
