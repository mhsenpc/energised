<?php

namespace App\Controllers;

use App\Services\Calculator;
use App\Services\ChargingAmount;
use App\Services\ChargingTime;
use App\Services\EnergyCalculator;
use App\Services\TimeCalculator;
use App\Services\TransactionCalculator;

class RateController extends Controller
{
    public function calculate(){
        $input = file_get_contents('php://input');
        $data = json_decode($input);

        $chargingAmount = new ChargingAmount();
        $chargingAmount->setMeterStart($data->cdr->meterStart);
        $chargingAmount->setMeterStop($data->cdr->meterStop);

        $chargingTime = new ChargingTime();
        $chargingTime->setTimestampStart($data->cdr->timestampStart);
        $chargingTime->setTimestampStop($data->cdr->timestampStop);


        $energyCalculator = new EnergyCalculator();
        $energyCalculator->setPricePerUnit($data->rate->energy);
        $energyCalculator->setAmount($chargingAmount->get());

        $timeCalculator = new TimeCalculator();
        $timeCalculator->setPricePerUnit($data->rate->time);
        $timeCalculator->setAmount($chargingTime->get());

        $transactionCalculator = new TransactionCalculator();
        $transactionCalculator->setPricePerUnit($data->rate->transaction);
        $transactionCalculator->setAmount(1);


        $response= [];
        $response['overall'] = $energyCalculator->calculate() +  $timeCalculator->calculate() + $transactionCalculator->calculate();
        $response['components']['energy'] =  $energyCalculator->calculate();
        $response['components']['time'] =  $timeCalculator->calculate();
        $response['components']['transaction'] =  $transactionCalculator->calculate();

        return json_encode($response);
    }
}