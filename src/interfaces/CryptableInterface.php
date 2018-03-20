<?php

namespace voskobovich\RandomTool\interfaces;

interface CryptableInterface
{
    /**
     * @param bool $value Increases the uniqueness of the generated value
     */
    public function setMoreEntropy(bool $value);

    /**
     * @param mixed $value Raw string
     * @return string
     */
    public function encrypt($value): string;

    /**
     * @param string $value Hashed string
     * @return mixed
     */
    public function decrypt(string $value);
}
