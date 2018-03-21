<?php

namespace voskobovich\RandomTool\Test;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use voskobovich\RandomTool\StringCrypter;
use voskobovich\RandomTool\interfaces\RandomNumberInterface;
use voskobovich\RandomTool\interfaces\RandomStringInterface;

class StringCrypterTest extends TestCase
{
    /**
     * @var StringCrypter
     */
    protected $crypter;

    public function setUp()
    {
        parent::setUp();

        /** @var MockObject|RandomNumberInterface $randomNumber */
        $randomNumber = $this->getMockBuilder(RandomNumberInterface::class)->getMock();
        $randomNumber->method('getNumber')->withAnyParameters()->willReturn(4);

        /** @var MockObject|RandomStringInterface $randomString */
        $randomString = $this->getMockBuilder(RandomStringInterface::class)->getMock();
        $randomString->method('getString')->withAnyParameters()->willReturn('E');

        $this->crypter = new StringCrypter($randomNumber, $randomString);
    }

    /**
     * @dataProvider getDataEncrypt
     * @param string $data
     * @param bool $moreEntropy
     * @param string $expected
     */
    public function testEncrypt($data, bool $moreEntropy, string $expected): void
    {
        $this->crypter->setMoreEntropy($moreEntropy);

        try {
            $result = $this->crypter->encrypt($data);
        } catch (\Exception $exception) {
            $result = 'exception';
        }

        self::assertSame($expected, $result);
    }

    /**
     * @dataProvider getDataDecrypt
     * @param string $data
     * @param bool $moreEntropy
     * @param string $expected
     */
    public function testDecrypt($data, bool $moreEntropy, string $expected): void
    {
        $this->crypter->setMoreEntropy($moreEntropy);

        self::assertSame($expected, $this->crypter->decrypt($data));
    }

    /**
     * @return array
     */
    public function getDataEncrypt(): array
    {
        return [
            [
                0 => 'raw data',
                1 => false,
                2 => 'rEa4wE 4dEa4tEa4',
            ],
            [
                0 => 'raw data',
                1 => true,
                2 => 'rEa4wE 4dEa4tEa4',
            ],
            [
                0 => new \stdClass(),
                1 => false,
                2 => 'exception',
            ],
        ];
    }

    /**
     * @return array
     */
    public function getDataDecrypt(): array
    {
        return [
            [
                0 => 'rEa4wE 4dEa4tEa4',
                1 => false,
                2 => 'raw data',
            ],
            [
                0 => 'rEa4wE 4dEa4tEa4',
                1 => true,
                2 => 'raw data',
            ],
        ];
    }
}
