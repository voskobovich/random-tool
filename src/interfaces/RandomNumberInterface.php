<?php

namespace voskobovich\RandomTool\interfaces;

interface RandomNumberInterface
{
    /**
     * @param bool $moreEntropy Increases the uniqueness of the generated value
     * @return mixed
     */
    public function getNumber(bool $moreEntropy = false);
}
