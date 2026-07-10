<?php

namespace Src\admin\user\application\dataTransferObject\output;
use Src\admin\user\domain\entities\User;

final class UserResponse
{
    public function __construct(
        public string $id,
        public string $name,
        public string $email
    ) {}

    public static function fromDomain(User $user): self
    {
        return new self(
            $user->id()->value(),
            $user->username()->value(),
            $user->email()->value()
        );
    }
}
