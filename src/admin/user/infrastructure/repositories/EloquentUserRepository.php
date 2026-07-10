<?php

namespace Src\admin\user\infrastructure\repositories;

use App\Models\User as EloquentUser;
use Src\admin\user\domain\entities\User;
use Src\admin\user\domain\repositories\UserRepositoryInterface;
use Src\admin\user\infrastructure\repositories\mappers\EloquentUserMapper;

class EloquentUserRepository implements UserRepositoryInterface
{

    public function __construct(
        private EloquentUserMapper $mapper
    ) {}

    public function getAll(): array
    {
        return array_map(
            fn($user) => $this->mapper->toDomain($user),
            EloquentUser::all()->all()
        );
    }

    public function findById(int $id): ?User
    {
        $eloquentUser = EloquentUser::find($id);

        return $eloquentUser
            ? $this->mapper->toDomain($eloquentUser)
            : null;
    }

    public function save(User $user): void
    {
        $eloquentUser = EloquentUser::updateOrCreate(
            ['id' => $user->id()->value()],
            [
                'name' => $user->username()->value(),
                'email' => $user->email()->value(),
                'password' => bcrypt('defaultpassword'),
            ]
        );
    }

    public function existsByEmail(string $email): bool
    {
        return EloquentUser::where('email', $email)->exists();
    }
}
