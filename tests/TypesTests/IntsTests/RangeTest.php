<?php

use HasPhp\Config\ExceptionStrings;
use HasPhp\Types\Ints;
use PHPUnit\Framework\TestCase;

final class RangeTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testIntsRangeWithStringsThrowsException(): void
    {
        // ARRANGE
        $this->expectException(Exception::class);
        $this->expectExceptionMessage(ExceptionStrings::INTS_RANGE_MUST_BE_NUMERIC);

        // ACT
        $range = Ints::range("1", "20");
    }

    /**
     * @throws Exception
     */
    public function testIntsRangeGeneratesCorrectRange(): void
    {
        // ARRANGE
        $expectedRange = [1, 2, 3, 4, 5];

        // ACT
        $range = Ints::range(1, 5)->asArray();

        // ASSERT
        $this->assertEquals($expectedRange, $range);
    }

    /**
     * @throws Exception
     */
    public function testIntsRangeStepSkipsCorrectAmount(): void
    {
        // ARRANGE
        $expectedRange = [2, 4, 6, 8, 10];

        // ACT
        $range = Ints::range(2, 10, 2)->asArray();

        // ASSERT
        $this->assertEquals($expectedRange, $range);
    }
}