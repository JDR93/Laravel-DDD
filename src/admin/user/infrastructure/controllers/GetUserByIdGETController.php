<?php

namespace Src\admin\user\infrastructure\controllers;

use Src\admin\user\domain\exceptions\UserNotFoundException;
use App\Http\Controllers\Controller;
use Src\admin\user\application\services\GetUserByIdService;

final class GetUserByIdGETController extends Controller
{

    private $getUserByIdService;

    public function __construct(GetUserByIdService $getUserByIdService)
    {
        $this->getUserByIdService = $getUserByIdService;
    }

    public function show(int $id)
    {
        try {
            $user = $this->getUserByIdService->execute($id);
            return response()->json([
                'id' => $user->id()->value(),
                'username' => $user->username()->value(),
                'email' => $user->email()->value(),
            ]);
        } catch (UserNotFoundException $e) {
            return response()->json([], 404);
        }
    }
}
