<?php

namespace voskobovich\RandomTool;

use voskobovich\RandomTool\interfaces\RandomNumberInterface;

class RandomFour implements RandomNumberInterface
{
    private const RANDOM_INT = 4;
    private const RANDOM_INT_MIN = self::RANDOM_INT;
    private const RANDOM_INT_MAX = self::RANDOM_INT;

    /**
     * Generate random number
     * @param bool $moreEntropy
     * @return int
     */
    public function getNumber(bool $moreEntropy = false): int
    {
        if (false === $moreEntropy) {
            return self::RANDOM_INT;
        }

        try {
            return \random_int(self::RANDOM_INT_MIN, self::RANDOM_INT_MAX);
        } catch (\Exception $e) {
            return self::RANDOM_INT;
        }
    }
}
