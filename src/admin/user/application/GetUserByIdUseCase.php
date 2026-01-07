<?php 

namespace Src\Admin\User\Application;

use Src\Admin\User\Domain\Contracts\UserRepositoryInterface;
use Src\Admin\User\Domain\Entities\User;

class GetUserByIdUseCase
{

    private UserRepositoryInterface $userRepository;    

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(int $id): User
    {
        $user = $this->userRepository->findById($id);
        return $user;
    }   

}