<?php

namespace Tests;

use App\Services\Calculators\TimeCalculator;
use PHPUnit\Framework\TestCase;

class TimeCalculatorTest extends TestCase
{
    public function testItCalculate()
    {
        $sut = new TimeCalculator();
        $sut->setTimestampStart('2021-04-05T10:04:00Z');
        $sut->setTimestampStop('2021-04-05T13:04:00Z');
        $sut->setPricePerUnit(2);
        $this->assertEquals(
            3 * 2,
            $sut->calculate()
        );
    }

    public function testGetAmountWithInteger()
    {
        $sut = new TimeCalculator();
        $sut->setTimestampStart('2021-04-05T10:04:00Z');
        $sut->setTimestampStop('2021-04-05T13:04:00Z');
        $this->assertEquals(
            3,
            $sut->getAmount()
        );
    }

    public function testHoursWithFragments()
    {
        $sut = new TimeCalculator();
        $sut->setTimestampStart('2021-04-05T10:04:00Z');
        $sut->setTimestampStop('2021-04-05T13:34:00Z');
        $this->assertEquals(
            3.5,
            $sut->getAmount()
        );
    }

    public function testItWorksWithMoreThanADayInput()
    {
        $sut = new TimeCalculator();
        $sut->setTimestampStart('2021-04-05T10:04:00Z');
        $sut->setTimestampStop('2021-04-07T10:04:00Z');
        $sut->setPricePerUnit(2);

        $this->assertEquals(
            48,
            $sut->getAmount()
        );
    }

    public function testItWorksWithViceVersaInput()
    {
        $sut = new TimeCalculator();
        $sut->setTimestampStart('2021-04-05T13:04:00Z');
        $sut->setTimestampStop('2021-04-05T11:04:00Z');
        $sut->setPricePerUnit(2);

        $this->assertEquals(
            2,
            $sut->getAmount()
        );
    }
}
