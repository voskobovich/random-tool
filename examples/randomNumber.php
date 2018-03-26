<?php

use voskobovich\RandomTool\RandomFour;

$randomNumber = new RandomFour();

$moreEntropy = false;
try {
    echo $randomNumber->getNumber($moreEntropy) . PHP_EOL;
} catch (Exception $exception) {
    echo 'Exception: ' . $exception->getMessage();
}
