<?php

use HasPhp\Types\Ints;
use PHPUnit\Framework\TestCase;

final class RangeUseTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testRangeFilterSumReturnsCorrectResult(): void
    {
        // ARRANGE
        // Even numbers 1-10, summed (2 + 4 + 6 + 8 + 10) = 30
        $expected = 30;
        $filterFunc = function ($i) {
            return $i % 2 == 0;
        };

        // ACT
        $result = Ints::range(1, 10)->filter($filterFunc)->sum();

        // ASSERT
        $this->assertEquals($expected, $result);
    }
}
