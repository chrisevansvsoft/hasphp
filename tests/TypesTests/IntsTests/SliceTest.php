<?php

use HasPhp\Types\Ints;
use PHPUnit\Framework\TestCase;

final class SliceTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testHeadReturnsFirstElementOfRange(): void
    {
        // ARRANGE
        $expectedRange = [10];

        // ACT
        $range = Ints::range(10, 20)->head()->asArray();

        // ASSERT
        $this->assertEquals($expectedRange, $range);
    }

    /**
     * @throws Exception
     */
    public function testTailReturnsLastElementOfRange(): void
    {
        // ARRANGE
        $expectedRange = [20];

        // ACT
        $range = Ints::range(10, 20)->last()->asArray();

        // ASSERT
        $this->assertEquals($expectedRange, $range);
    }

    /**
     * @throws Exception
     */
    public function testInitReturnsAllExceptLastOfRange(): void
    {
        // ARRANGE
        $expectedRange = [1, 2, 3, 4];

        // ACT
        $range = Ints::range(1, 5)->init()->asArray();

        // ASSERT
        $this->assertEquals($expectedRange, $range);
    }
}
