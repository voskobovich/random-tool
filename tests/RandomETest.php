<?php

namespace voskobovich\RandomTool\Test;

use PHPUnit\Framework\TestCase;
use voskobovich\RandomTool\RandomE;
use voskobovich\RandomTool\RandomFour;

/**
 * Class RandomDTest
 */
class RandomETest extends TestCase
{
    /**
     * @dataProvider dataTest
     * @param integer $length
     * @param bool $moreEntropy
     * @param string $expected
     */
    public function testGetString(int $length, bool $moreEntropy, string $expected)
    {
        $randomNumber = new RandomFour();

        $randomString = new RandomE($randomNumber);

        self::assertSame($randomString->getString($length, $moreEntropy), $expected);
    }

    public function dataTest(): array
    {
        return [
            [
                0 => 1,
                1 => false,
                2 => 'E',
            ],
            [
                0 => 1,
                1 => true,
                2 => 'E',
            ],
            [
                0 => 2,
                1 => false,
                2 => 'E',
            ],
            [
                0 => 2,
                1 => true,
                2 => 'E',
            ],
        ];
    }
}
