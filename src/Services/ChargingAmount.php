<?php


namespace App\Services;


use App\Exceptions\InvalidMeterValueException;

class ChargingAmount
{
    protected int $meterStart;
    protected int $meterStop;

    /**
     * @return int
     */
    public function getMeterStart(): int
    {
        return $this->meterStart;
    }

    /**
     * @param int $meterStart
     */
    public function setMeterStart(int $meterStart): void
    {
        $this->meterStart = $meterStart;
    }

    /**
     * @return int
     */
    public function getMeterStop(): int
    {
        return $this->meterStop;
    }

    /**
     * @param int $meterStop
     */
    public function setMeterStop(int $meterStop): void
    {
        if ($meterStop < $this->meterStart) {
            throw new InvalidMeterValueException();
        }
        $this->meterStop = $meterStop;
    }

    public function get(): float
    {
        return $this->meterStop - $this->meterStart;
    }
}