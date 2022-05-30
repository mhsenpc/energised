<?php

namespace App\Controllers;

use App\Services\Calculators\EnergyCalculator;
use App\Services\Calculators\TimeCalculator;
use App\Services\Calculators\TransactionCalculator;
use App\Services\RateCalculator;

class RateController extends Controller
{
    public function calculate()
    {
        $input = file_get_contents('php://input');
        $data = json_decode($input);

        $rateCalculator = new RateCalculator();

        $energyCalculator = new EnergyCalculator();
        $energyCalculator->setPricePerUnit($data->rate->energy);
        $energyCalculator->setMeterStart($data->cdr->meterStart);
        $energyCalculator->setMeterStop($data->cdr->meterStop);
        $rateCalculator->addComponent($energyCalculator);

        $timeCalculator = new TimeCalculator();
        $timeCalculator->setPricePerUnit($data->rate->time);
        $timeCalculator->setTimestampStart($data->cdr->timestampStart);
        $timeCalculator->setTimestampStop($data->cdr->timestampStop);
        $rateCalculator->addComponent($timeCalculator);

        $transactionCalculator = new TransactionCalculator();
        $transactionCalculator->setPricePerUnit($data->rate->transaction);
        $rateCalculator->addComponent($transactionCalculator);

        $response = [];
        $response['overall'] = $rateCalculator->getTotalAmount();
        foreach ($rateCalculator->getComponents() as $component) {
            $response['components'][$component->getName()] = $component->calculate();
        }

        return json_encode($response);
    }
}