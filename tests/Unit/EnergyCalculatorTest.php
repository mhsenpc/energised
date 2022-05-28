<?php


namespace Tests;


use App\Services\EnergyCalculator;
use App\Services\TimeCalculator;
use PHPUnit\Framework\TestCase;

class EnergyCalculatorTest extends TestCase
{
    public function testItWorksWithStandardInput(){
        $sut = new EnergyCalculator();
        $sut->setPricePerUnit(0.30);
        $sut->setAmount(2);
        $this->assertEquals(
            0.60,
            $sut->calculate()
        );
    }

    public function testItWorksWithFloatInput(){
        $sut = new EnergyCalculator();
        $sut->setAmount(2.5);
        $sut->setPricePerUnit(0.30);
        $this->assertEquals(
            0.75,
            $sut->calculate()
        );
    }

    public function testItFailsWithWrongInput(){
        $sut = new EnergyCalculator();
        $sut->setAmount(2);
        $sut->setPricePerUnit(0.30);
        $this->assertNotEquals(
            10,
            $sut->calculate()
        );
    }
}