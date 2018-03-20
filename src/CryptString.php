<?php

namespace voskobovich\RandomTool;

use voskobovich\RandomTool\interfaces\CryptableInterface;
use voskobovich\RandomTool\interfaces\RandomNumberInterface;
use voskobovich\RandomTool\interfaces\RandomStringInterface;

class CryptString implements CryptableInterface
{
    private $moreEntropy = false;

    private $randomNumber;
    private $randomString;

    /**
     * HashBuilder constructor.
     * @param RandomNumberInterface $randomNumber
     * @param RandomStringInterface $randomString
     */
    public function __construct(RandomNumberInterface $randomNumber, RandomStringInterface $randomString)
    {
        $this->randomNumber = $randomNumber;
        $this->randomString = $randomString;
    }

    /**
     * @param bool $value Increases the uniqueness of the generated value
     * @return CryptString
     */
    public function setMoreEntropy(bool $value): CryptString
    {
        $this->moreEntropy = $value;

        return $this;
    }

    /**
     * @param string $value Raw string
     * @return string
     * @throws \InvalidArgumentException
     */
    public function encrypt($value): string
    {
        if (false === \is_string($value)) {
            throw new \InvalidArgumentException('The value must be a string');
        }

        $result = $this->randomNumber->getNumber($this->moreEntropy);
        $result .= $value;
        $result .= $this->randomString->getString($this->moreEntropy);

        return $result;
    }

    /**
     * @param string $value Hashed string
     * @return string
     */
    public function decrypt(string $value): ?string
    {
        return \str_replace(
            [
                $this->randomNumber->getNumber($this->moreEntropy),
                $this->randomString->getString($this->moreEntropy)
            ],
            '',
            $value
        );
    }
}
