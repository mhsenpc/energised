<?php

namespace Tests;

use App\Exceptions\InvalidMeterValueException;
use App\Services\ChargingAmount;
use PHPUnit\Framework\TestCase;

class ChargingAmountTest extends TestCase
{
    public function testItWorksWithStandardInput(){
        $sut = new ChargingAmount();
        $sut->setMeterStart(20);
        $sut->setMeterStop(100);
        $this->assertEquals(
            80,
            $sut->get()
        );
    }

    public function testItShouldReturnException(){
        $sut = new ChargingAmount();
        $sut->setMeterStart(100);
        $sut->setMeterStop(90);


        $this->expectException(InvalidMeterValueException::class);

        $sut->get();
    }
}
