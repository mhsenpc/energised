<?php

use App\Controllers\HomeController;
use App\Controllers\RateController;

require __DIR__ . '../vendor/autoload.php';

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/' :
        $controller = new HomeController();
        echo $controller->index();
        break;
    case '/rate' :
        $controller = new RateController();
        echo $controller->calculate();
        break;
    default:
        http_response_code(404);
        echo "Undefined Route";
        break;
}