<?php


namespace Tests;


use App\Exceptions\InvalidMeterValueException;
use App\Services\Calculators\EnergyCalculator;
use PHPUnit\Framework\TestCase;

class EnergyCalculatorTest extends TestCase
{
    public function testCalculate(){
        $sut = new EnergyCalculator();
        $sut->setPricePerUnit(0.30);
        $sut->setMeterStart(20);
        $sut->setMeterStop(100);
        $this->assertEquals(
            80 * 0.30,
            $sut->calculate()
        );
    }


    public function testItFailsWithWrongInput(){
        $sut = new EnergyCalculator();
        $sut->setMeterStart(20);
        $sut->setMeterStop(100);
        $sut->setPricePerUnit(0.30);
        $this->assertNotEquals(
            10,
            $sut->calculate()
        );
    }

    public function testItReturnsRightAmount(){
        $sut = new EnergyCalculator();
        $sut->setMeterStart(20);
        $sut->setMeterStop(100);
        $this->assertEquals(
            80,
            $sut->getAmount()
        );
    }
}