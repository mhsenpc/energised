<?php

namespace Tests;

use App\Services\ChargingTime;
use PHPUnit\Framework\TestCase;

class ChargingTimeTest extends TestCase
{
    public function testItWorksWithHoursInput()
    {
        $sut = new ChargingTime();
        $sut->setTimestampStart('2021-04-05T10:04:00Z');
        $sut->setTimestampStop('2021-04-05T13:54:00Z');
        $this->assertEquals(
            3,
            $sut->get()
        );
    }

    public function testItWorksWithMoreThanADayInput()
    {
        $sut = new ChargingTime();
        $sut->setTimestampStart('2021-04-05T10:04:00Z');
        $sut->setTimestampStop('2021-04-07T10:54:00Z');

        $this->assertEquals(
            48,
            $sut->get()
        );
    }
}
