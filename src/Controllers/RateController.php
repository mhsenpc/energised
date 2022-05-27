<?php

namespace App\Controllers;

use App\Services\Calculator;

class RateController extends Controller
{
    public function calculate(){
        $sut = new Calculator();
        return $sut->calculate();
    }
}