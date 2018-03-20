<?php

namespace voskobovich\RandomTool;

use voskobovich\RandomTool\interfaces\RandomNumberInterface;
use voskobovich\RandomTool\interfaces\RandomStringInterface;

class RandomE implements RandomStringInterface
{
    private const LIBRARY_CHARACTER = 'E';
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
     */
    public function getString(int $length = 1, bool $moreEntropy = false): string
    {
        if (false === $moreEntropy) {
            return self::LIBRARY_CHARACTER;
        }

        $pos = $this->randomNumber->getNumber($moreEntropy);
        $library = $this->getCharacterLibrary();

        if (false === empty($library[$pos])) {
            return $library[$pos];
        }

        return self::LIBRARY_CHARACTER;
    }
}
