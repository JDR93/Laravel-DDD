<?php

namespace App\Admin\User\Application;

use Src\Admin\User\Domain\Contracts\UserRepositoryInterface;
use Src\Admin\User\Domain\Entities\User;
use Src\Admin\User\Domain\ValueObjects\UserEmail;
use Src\Admin\User\Domain\ValueObjects\UserName;

class CreateUserUseCase
{

    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }   

    public function execute(int $id, string $name, string $email): void
    {

        $nameValueObject = new UserName($name);
        $emailValueObject = new UserEmail($email);

        $user = new User($id, $nameValueObject, $emailValueObject);
        $this->userRepository->save($user);
    }   
}

