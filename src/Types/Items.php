<?php

namespace HasPhp\Types;

use Closure;

class Items
{
    protected $members;

    public function __construct($members)
    {
        $this->members = is_array($members) ? $members : [$members];
    }

    public function asArray()
    {
        return $this->members;
    }

    public function first()
    {
        return reset($this->members);
    }

    public static function range($start, $end, int $step = 1): self
    {
        if ($end < $start) {
            return new static([]);
        }

        return new static(range($start, $end, $step));
    }

    public function filter(Closure $closure): self
    {
        $newMembers = [];

        foreach ($this->members as $member) {
            if ($closure($member)) {
                array_push($newMembers, $member);
            }
        }

        return new $this($newMembers);
    }

    public function head(): self
    {
        return new $this(reset($this->members));
    }

    public function tail(): self
    {
        return new $this(array_slice($this->members, 1));
    }

    public function init(): self
    {
        return new $this(array_slice($this->members, 0, -1));
    }

    public function last(): self
    {
        return new $this(array_slice($this->members, -1));
    }
}