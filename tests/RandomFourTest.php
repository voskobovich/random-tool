<?php

namespace voskobovich\RandomTool\Test;

use PHPUnit\Framework\TestCase;
use voskobovich\RandomTool\RandomFour;

class RandomFourTest extends TestCase
{
    /**
     * @dataProvider getData
     * @param bool $moreEntropy
     * @param int $expected
     * @throws \Exception
     */
    public function testGetNumber(bool $moreEntropy, int $expected): void
    {
        $randomNumber = new RandomFour();

        self::assertSame($expected, $randomNumber->getNumber($moreEntropy));
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return [
            [
                0 => false,
                1 => 4,
            ],
            [
                0 => true,
                1 => 4,
            ],
        ];
    }
}
