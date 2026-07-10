<?php

namespace Src\admin\user\application\dataTransferObject\input;

final class CreateUserRequest
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $password
    ) {}
}
