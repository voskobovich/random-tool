<?php

namespace voskobovich\RandomTool\interfaces;

interface RandomStringInterface
{
    /**
     * @param int $length Length of the generated string
     * @param bool $moreEntropy Increases the uniqueness of the generated value
     * @return mixed
     */
    public function getString(int $length = 1, bool $moreEntropy = false);
}
