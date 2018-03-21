<?php

namespace voskobovich\RandomTool;

use voskobovich\RandomTool\interfaces\RandomNumberInterface;
use voskobovich\RandomTool\interfaces\RandomStringInterface;

class RandomString implements RandomStringInterface
{
    private const LIBRARY_CHARACTER_FIRST = 'A';
    private const LIBRARY_CHARACTER_LAST = 'Z';

    /**
     * @var RandomNumberInterface
     */
    private $randomNumber;

    /**
     * RandomHBuilder constructor.
     * @param RandomNumberInterface $randomNumber
     */
    public function __construct(RandomNumberInterface $randomNumber)
    {
        $this->randomNumber = $randomNumber;
    }

    /**
     * Get character library
     * @return array
     */
    protected function getCharacterLibrary(): array
    {
        return \range(
            self::LIBRARY_CHARACTER_FIRST,
            self::LIBRARY_CHARACTER_LAST
        );
    }

    /**
     * Generate random character
     * @param int $length Length of the generated string
     * @param bool $moreEntropy Increases the uniqueness of the generated value
     * @return string
     * @throws \RuntimeException
     */
    public function getString(int $length = 1, bool $moreEntropy = false): string
    {
        $pos = $this->randomNumber->getNumber($moreEntropy);
        $library = $this->getCharacterLibrary();

        if (false === array_key_exists($pos, $library)) {
            throw new \RuntimeException('The position ' . $pos . ' in the character library was not found.');
        }

        return str_repeat($library[$pos], $length);
    }
}
