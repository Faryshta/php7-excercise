<?php

use faryshta\excercise\{Connection,FibonacciModel};

require 'vendor/autoload.php';

$limit = $_GET['limit'] ?? 4000000;

$db = Connection::createPDO('php7_excercise', 'root', 'root');

/**
 * Don't edit anything below this line
 */

$fibonacciModel = new FibonacciModel($db);

$lastFibonacci = $fibonacciModel->getBiggest();

if ($lastFibonacci < $limit) {
    $prevFibonacci = $fibonacciModel->getSecondBiggest();
    while ($lastFibonacci < $limit) {
        $lastFibonacci = $prevFibonacci + $lastFibonacci;
        $prevFibonacci = $lastFibonacci - $prevFibonacci;
        $fibonacciModel->save($lastFibonacci);
    }
}

echo $fibonacciModel->sumEven($limit), PHP_EOL;
