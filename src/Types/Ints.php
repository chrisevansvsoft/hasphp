<?php

namespace HasPhp\Types;

use Exception;
use HasPhp\Config\ExceptionStrings;
use HasPhp\Helpers\Validator;

class Ints extends Items
{
    public function __construct($items)
    {
        parent::__construct($items);
    }

    /**
     * @param $start
     * @param $end
     * @param int $range
     * @return Items
     * @throws Exception
     */
    public static function range($start, $end, int $range = 1): Items
    {
        if (!Validator::validate([$start, $end], function ($value) {
            return is_int($value);
        })) {
            throw new Exception(ExceptionStrings::INTS_RANGE_MUST_BE_NUMERIC);
        }
        return parent::range($start, $end, $range);
    }

    /**
     * @return int
     */
    public function sum(): int
    {
        return array_sum($this->members);
    }
}