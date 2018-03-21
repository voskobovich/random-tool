<?php

use voskobovich\RandomTool\RandomString;
use voskobovich\RandomTool\RandomFour;

$randomNumber = new RandomFour();
$randomString = new RandomString($randomNumber);

$moreEntropy = false;
echo $randomString->getString($moreEntropy) . PHP_EOL;
