<?php

namespace Src\admin\user\application\services;

use EmailAlreadyExistsException;
use Src\admin\user\application\dataTransferObject\input\CreateUserRequest;
use Src\admin\user\domain\entities\User;
use Src\admin\user\domain\repositories\UserRepositoryInterface;
use Src\admin\user\domain\value_objects\UserEmail;
use Src\admin\user\domain\value_objects\UserName;
use Src\admin\user\domain\value_objects\UserId;

class CreateUserService
{
    private UserRepositoryInterface $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(CreateUserRequest $request): void
    {
        if ($this->repository->existsByEmail($request->email)) {
            throw new EmailAlreadyExistsException();
        }

        $user = new User(
            UserId::generate(),
            new UserName($request->name),
            new UserEmail($request->email),
        );

        $this->repository->save($user);
    }
}
