<?php

namespace HasPhp\Types;

require_once "Items.php";

use Closure;

class Ints extends Items
{
    public function __construct(array $items)
    {
        parent::__construct($items);
    }

    public function sum(): int
    {
        return array_sum($this->members);
    }
}