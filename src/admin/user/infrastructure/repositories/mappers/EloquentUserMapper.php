<?php

namespace Src\admin\user\infrastructure\repositories\mappers;

use App\Models\User as EloquentUser;
use Src\admin\user\domain\entities\User;
use Src\admin\user\domain\value_objects\UserEmail;
use Src\admin\user\domain\value_objects\UserId;
use Src\admin\user\domain\value_objects\UserName;

final class EloquentUserMapper
{
    public function toDomain(EloquentUser $user): User
    {
        return new User(
            new UserId($user->id),
            new UserName($user->name),
            new UserEmail($user->email)
        );
    }
}
