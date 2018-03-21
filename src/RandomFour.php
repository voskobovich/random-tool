<?php

namespace voskobovich\RandomTool;

use voskobovich\RandomTool\interfaces\RandomNumberInterface;

class RandomFour implements RandomNumberInterface
{
    /**
     * The basic value of randomize logic
     * @return int
     */
    protected function getValue(): int
    {
        return 4;
    }

    protected function runSimpleLogic(): int
    {
        return $this->getValue();
    }

    /**
     * @return int
     * @throws \Exception
     */
    protected function runExtendLogic(): int
    {
        return \random_int($this->getValue(), $this->getValue());
    }

    /**
     * Generate random number
     * @param bool $moreEntropy
     * @return int
     * @throws \Exception
     */
    public function getNumber(bool $moreEntropy = false): int
    {
        if (false === $moreEntropy) {
            return $this->runSimpleLogic();
        }

        return $this->runExtendLogic();
    }
}
