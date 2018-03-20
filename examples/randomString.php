<?php

use voskobovich\RandomTool\RandomE;
use voskobovich\RandomTool\RandomFour;

$randomNumber = new RandomFour();
$randomString = new RandomE($randomNumber);

$moreEntropy = false;
echo $randomString->getString($moreEntropy) . PHP_EOL;
