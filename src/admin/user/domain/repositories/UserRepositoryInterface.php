<?php

namespace Src\admin\user\domain\repositories;

use Src\admin\user\domain\entities\User;

interface UserRepositoryInterface
{
    public function getAll(): array;
    public function findById(int $id): ?User;
    public function save(User $user): void;
    public function existsByEmail(string $email): bool;
}
