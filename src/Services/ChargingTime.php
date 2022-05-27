<?php


namespace App\Services;


class ChargingTime
{
    protected \DateTime $timestampStart;
    protected \DateTime $timestampStop;

    /**
     * @return \DateTime
     */
    public function getTimestampStart(): \DateTime
    {
        return $this->timestampStart;
    }

    /**
     * @param string $timestampStart
     */
    public function setTimestampStart(string $timestampStart): void
    {
        $this->timestampStart = date_create_from_format(DATE_W3C, $timestampStart);
    }

    /**
     * @return \DateTime
     */
    public function getTimestampStop(): \DateTime
    {
        return $this->timestampStop;
    }

    /**
     * @param string $timestampStop
     */
    public function setTimestampStop(string $timestampStop): void
    {
        $this->timestampStop = date_create_from_format(DATE_W3C, $timestampStop);
    }

    /**
     * returns hours between start and stop
     * @return float
     */
    public function get(): float
    {
        $diff = $this->timestampStart->diff($this->timestampStop);
        return $diff->d * 24 + $diff->h;
    }
}