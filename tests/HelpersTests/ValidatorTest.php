<?php
declare(strict_types=1);

use HasPhp\Helpers\Validator;
use PHPUnit\Framework\TestCase;

final class ValidatorTest extends TestCase
{
    public function testValidateReturnsTrueIfAllItemsAreValid(): void
    {
        // ARRANGE
        $testArray = [2, 4, 6, 8, 10];
        $closure = function ($value) {
            return $value % 2 == 0;
        };

        // ACT
        $isValid = Validator::validate($testArray, $closure);

        // ASSERT
        $this->assertTrue($isValid);
    }

    public function testValidateReturnsFalseIfAnyItemsAreInvalid(): void
    {
        // ARRANGE
        $testArray = [1, 2, 3, 4, 5];
        $closure = function ($value) {
            return $value % 2 == 0;
        };

        // ACT
        $isValid = Validator::validate($testArray, $closure);

        // ASSERT
        $this->assertFalse($isValid);
    }

    public function testValidateWorksWithSingleValue(): void
    {
        // ARRANGE
        $testValue = 2;
        $closure = function ($value) {
            return $value % 2 == 0;
        };

        // ACT
        $isValid = Validator::validate($testValue, $closure);

        // ASSERT
        $this->assertTrue($isValid);
    }
}