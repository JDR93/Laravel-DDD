<?php

namespace Src\admin\user\domain\value_objects;

class UserName
{
    private string $value;

    public function __construct(string $value)
    {
        if (strlen($value) < 3) {
            throw new \InvalidArgumentException("Username must be at least 3 characters long.");
        }
        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }
}
