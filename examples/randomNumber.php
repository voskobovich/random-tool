<?php

use voskobovich\RandomTool\RandomFour;

$randomSeven = new RandomFour();

$moreEntropy = false;
try {
    echo $randomSeven->getNumber($moreEntropy) . PHP_EOL;
} catch (Exception $exception) {
    echo 'Exception: ' . $exception->getMessage();
}
