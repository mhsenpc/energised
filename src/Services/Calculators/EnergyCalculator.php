<?php


namespace App\Services\Calculators;


use App\Exceptions\InvalidMeterValueException;

class EnergyCalculator extends CalculatorAbstract
{
    protected string $name = 'Energy';

    protected float $meterStart;

    /**
     * @return float
     */
    public function getMeterStart(): float
    {
        return $this->meterStart;
    }

    /**
     * @param float $meterStart
     */
    public function setMeterStart(float $meterStart): void
    {
        $this->meterStart = $meterStart;
    }

    /**
     * @return float
     */
    public function getMeterStop(): float
    {
        return $this->meterStop;
    }

    /**
     * @param float $meterStop
     */
    public function setMeterStop(float $meterStop): void
    {
        if ($meterStop < $this->meterStart) {
            throw new InvalidMeterValueException();
        }
        $this->meterStop = $meterStop;
    }
    protected float $meterStop;

    public function getAmount(): float
    {
        return $this->meterStop - $this->meterStart;
    }
}