<?php

namespace tests;

use PHPUnit\Framework\TestCase;
use Y\Formatters\FileFormatter;

class FileFormatterTest extends TestCase
{
    public function dataProvider()
    {
        return [
            [['key' => 'val', 'key2' => 'val2'], "key:val, key2:val2\r\n"],
        ];
    }

    /**
     * @dataProvider dataProvider
     */
    public function testFormatArrayToString($arr, $expected): void
    {
        $formatter = new FileFormatter();

        $resultStr = $formatter->format($arr);

        $this->assertSame($resultStr, $expected);
    }
}