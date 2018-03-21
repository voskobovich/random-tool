<?php

namespace voskobovich\RandomTool\Test;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use voskobovich\RandomTool\interfaces\RandomNumberInterface;
use voskobovich\RandomTool\RandomString;

class RandomStringTest extends TestCase
{
    /**
     * @dataProvider dataGetString
     * @param array $data
     * @param string $expected
     */
    public function testGetString(array $data, string $expected): void
    {
        /** @var MockObject|RandomNumberInterface $randomNumberMock */
        $randomNumberMock = $this->getMockBuilder(RandomNumberInterface::class)->getMock();
        $randomNumberMock->method('getNumber')->withAnyParameters()->willReturn($data['getNumber']);

        $randomString = new RandomString($randomNumberMock);

        try {
            $result = $randomString->getString($data['length']);
        } catch (\Exception $exception) {
            $result = 'exception';
        }

        self::assertSame($result, $expected);
    }

    /**
     * @return array
     */
    public function dataGetString(): array
    {
        return [
            [
                0 => [
                    'length' => 1,
                    'getNumber' => 4,
                ],
                2 => 'E',
            ],
            [
                0 => [
                    'length' => 2,
                    'getNumber' => 4,
                ],
                2 => 'EE',
            ],
            [
                0 => [
                    'length' => 2,
                    'getNumber' => -2,
                ],
                2 => 'exception',
            ],
        ];
    }
}
