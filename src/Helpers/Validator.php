<?php

namespace HasPhp\Helpers;

use Closure;

class Validator
{
    public static function validate($items, Closure $closure): bool
    {
        $items = !is_array($items) ? [$items] : $items;

        $valid = true;

        array_map(function ($item) use ($closure, &$valid) {
            if (!$closure($item)) {
                $valid = false;
            }
        }, $items);

        return $valid;
    }
}