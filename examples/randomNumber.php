<?php

use voskobovich\RandomTool\RandomFour;

$randomSeven = new RandomFour();

$moreEntropy = false;
echo $randomSeven->getNumber($moreEntropy) . PHP_EOL;
