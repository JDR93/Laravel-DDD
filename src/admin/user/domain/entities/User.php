<?php

namespace Src\Admin\User\Domain\Entities;

use Src\Admin\User\Domain\ValueObjects\UserEmail;
use Src\Admin\User\Domain\ValueObjects\Username;

class User
{
    private int $id;
    private UserName $username;
    private UserEmail $email;

    public function __construct(
        int $id,
        Username $username,
        UserEmail $email,
    ) {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
    }

    public function id(): int
    {
        return $this->id;
    }

    public function username(): UserName
    {
        return $this->username;
    }
    
    public function email(): UserEmail
    {
        return $this->email;
    }
}
