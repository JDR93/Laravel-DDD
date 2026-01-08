<?php

namespace Src\Admin\User\infrastructure\Repositories;

use Src\Admin\User\Domain\Contracts\UserRepositoryInterface;
use App\Models\User as EloquentUser;
use Src\Admin\User\Domain\Entities\User;
use Src\Admin\User\Domain\ValueObjects\UserEmail;
use Src\Admin\User\Domain\ValueObjects\UserName;

class EloquentUserRepository implements UserRepositoryInterface
{
    public function findById(int $id): ?User
    {
        $eloquentUser = EloquentUser::find($id);
        if (!$eloquentUser) {
            return null;
        }

        return new User(
            $eloquentUser->id,
            new UserName($eloquentUser->name),
            new UserEmail($eloquentUser->email)
        );
    }

    public function save(User $user): void
    {
        EloquentUser::updateOrCreate(
            ['id' => $user->id()],
            [
                'name' => $user->username()->getValue(),
                'email' => $user->email()->getValue(),
            ]
        );
    }
}
