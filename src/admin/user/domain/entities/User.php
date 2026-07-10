<?php

namespace Src\admin\user\domain\entities;

use Src\admin\user\domain\value_objects\UserEmail;
use Src\admin\user\domain\value_objects\UserId;
use Src\admin\user\domain\value_objects\Username;

class User
{
    private UserId $id;
    private UserName $username;
    private UserEmail $email;

    public function __construct(
        UserId $id,
        Username $username,
        UserEmail $email,
    ) {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
    }

    public function id(): UserId
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
