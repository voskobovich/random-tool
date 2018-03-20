<?php

namespace voskobovich\RandomTool;

use PHPUnit\Framework\TestCase;

class CryptStringTest extends TestCase
{
    /**
     * @var CryptString
     */
    protected $cryper;

    public function setUp()
    {
        parent::setUp();

        $randomNumber = new RandomFour();
        $randomString = new RandomE($randomNumber);

        $this->cryper = new CryptString($randomNumber, $randomString);
    }

    /**
     * @dataProvider getDataEncrypt
     * @param string $data
     * @param bool $moreEntropy
     * @param string $expected
     */
    public function testEncrypt(string $data, bool $moreEntropy, string $expected): void
    {
        $this->cryper->setMoreEntropy($moreEntropy);

        self::assertSame($expected, $this->cryper->encrypt($data));
    }

    /**
     * @dataProvider getDataDecrypt
     * @param string $data
     * @param bool $moreEntropy
     * @param string $expected
     */
    public function testDecrypt(string $data, bool $moreEntropy, string $expected): void
    {
        $this->cryper->setMoreEntropy($moreEntropy);

        self::assertSame($expected, $this->cryper->decrypt($data));
    }

    public function getDataEncrypt(): array
    {
        return [
            [
                0 => 'raw data',
                1 => false,
                2 => '4raw dataE',
            ],
            [
                0 => 'raw data',
                1 => true,
                2 => '4raw dataE',
            ],
        ];
    }

    public function getDataDecrypt(): array
    {
        return [
            [
                0 => '4raw dataE',
                1 => false,
                2 => 'raw data',
            ],
            [
                0 => '4raw dataE',
                1 => true,
                2 => 'raw data',
            ],
        ];
    }
}
