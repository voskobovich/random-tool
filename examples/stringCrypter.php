<?php

use voskobovich\RandomTool\StringCrypter;
use voskobovich\RandomTool\RandomString;
use voskobovich\RandomTool\RandomFour;

$randomNumber = new RandomFour();
$randomString = new RandomString($randomNumber);
$cryptString = new StringCrypter($randomNumber, $randomString);

$moreEntropy = false;
$rawString = 'raw data';

$cryptedString = $cryptString->encrypt($rawString);
echo $cryptedString . PHP_EOL;
echo $cryptString->decrypt($cryptedString) . PHP_EOL;
