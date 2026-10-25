<?php

namespace Nekman\LuhnAlgorithm\Test;

use function Nekman\LuhnAlgorithm\Functions\string_is_numeric;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class FunctionsTest extends TestCase
{
    #[DataProvider('provideStringIsNumeric')]
    public function testStringIsNumeric($string, $expected)
    {
        $this->assertEquals($expected, string_is_numeric($string));
    }

    public static function provideStringIsNumeric()
    {
        return [
            "integer string" => ["123", true],
            "float string" => ["123.321", true],
            "whitespace" => ["123 ", false],
            "integer" => [123, true],
            "float" => [123.321, true],
        ];
    }
}
