<?php

namespace HasPhp\Types;

use Closure;

class Items
{
    protected $members;

    public function __construct(array $members)
    {
        $this->members = $members;
    }

    public static function range($start, $end, int $step = 1): Items
    {
        if ($end < $start) {
            return new static([]);
        }

        return new static(range($start, $end, $step));
    }

    public function filter(Closure $closure): Items
    {
        $newMembers = [];

        foreach ($this->members as $member) {
            if ($closure($member)) {
                array_push($newMembers, $member);
            }
        }

        return new $this($newMembers);
    }

    public function head()
    {
        return reset($this->members);
    }

    public function tail()
    {
        return array_slice($this->members, 1);
    }
}