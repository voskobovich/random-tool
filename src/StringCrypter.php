<?php

namespace voskobovich\RandomTool;

use voskobovich\RandomTool\interfaces\CryptableInterface;
use voskobovich\RandomTool\interfaces\RandomNumberInterface;
use voskobovich\RandomTool\interfaces\RandomStringInterface;

class StringCrypter implements CryptableInterface
{
    private $moreEntropy = false;

    private $randomNumber;
    private $randomString;

    public function __construct(RandomNumberInterface $randomNumber, RandomStringInterface $randomString)
    {
        $this->randomNumber = $randomNumber;
        $this->randomString = $randomString;
    }

    protected function getCryptNumber(): string
    {
        return (string)$this->randomNumber->getNumber($this->moreEntropy);
    }

    protected function getCryptString(): string
    {
        return (string)$this->randomString->getString($this->moreEntropy);
    }

    public function setMoreEntropy(bool $value): StringCrypter
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

        $cryptNumber = $this->getCryptNumber();
        $cryptString = $this->getCryptString();

        $valueAsArray = str_split($value);
        foreach ($valueAsArray as $n => &$character) {
            if ($n % 2) {
                $character .= $cryptNumber;
            } else {
                $character .= $cryptString;
            }
        }
        unset($character);

        return implode('', $valueAsArray);
    }

    /**
     * @param string $value Hashed string
     * @return string
     */
    public function decrypt(string $value): string
    {
        $cryptNumber = $this->getCryptNumber();
        $cryptString = $this->getCryptString();

        $valueAsArray = str_split($value);
        foreach ($valueAsArray as $n => $character) {
            if ($n % 2 && ($character === $cryptNumber || $character === $cryptString)) {
                unset($valueAsArray[$n]);
            }
        }

        return implode('', $valueAsArray);
    }
}
