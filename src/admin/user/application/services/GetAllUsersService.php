<?php

namespace Src\admin\user\application\services;

use Src\admin\user\application\dataTransferObject\output\UserResponse;
use Src\admin\user\domain\entities\User;
use Src\admin\user\domain\repositories\UserRepositoryInterface;

class GetAllUsersService
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(): array
    {
        return array_map(
            fn(User $user) => UserResponse::fromDomain($user),
            $this->userRepository->getAll()
        );
    }
}
