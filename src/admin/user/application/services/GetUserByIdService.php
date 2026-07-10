<?php

namespace Src\admin\user\application\services;

use Src\admin\user\domain\exceptions\UserNotFoundException;
use Src\admin\user\domain\entities\User;
use Src\admin\user\domain\repositories\UserRepositoryInterface;

class GetUserByIdService
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(int $id): User
    {
        $user = $this->userRepository->findById($id);
        if (!$user) {
            throw new UserNotFoundException();
        }
        return $user;
    }
}
