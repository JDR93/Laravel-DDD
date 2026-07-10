<?php

namespace Src\admin\user\infrastructure\controllers;

use Src\admin\user\application\services\GetAllUsersService;

class GetAllUsersGETController
{

    private $getAllUsersService;

    public function __construct(GetAllUsersService $getAllUsersService)
    {
        $this->getAllUsersService = $getAllUsersService;
    }

    public function all()
    {
        return response()->json(
            $this->getAllUsersService->execute()
        );
    }
}
