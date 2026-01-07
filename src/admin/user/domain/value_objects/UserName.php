<?php 

namespace Src\Admin\User\Domain\ValueObjects;

class UserName
{
    private string $value;

    public function __construct(string $value)
    {
        if(strlen($value) < 3){
            throw new \InvalidArgumentException("Username must be at least 3 characters long.");
        }
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

}

