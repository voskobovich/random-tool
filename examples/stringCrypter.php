<?php

use voskobovich\RandomTool\CryptString;
use voskobovich\RandomTool\RandomE;
use voskobovich\RandomTool\RandomFour;

$randomNumber = new RandomFour();
$randomString = new RandomE($randomNumber);
$cryptString = new CryptString($randomNumber, $randomString);

$moreEntropy = false;
$rawString = 'raw data';

$cryptedString = $cryptString->encrypt($rawString);
echo $cryptedString . PHP_EOL;
echo $cryptString->decrypt($cryptedString) . PHP_EOL;
