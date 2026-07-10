<?php

namespace Src\admin\user\infrastructure\controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Src\admin\user\application\dataTransferObject\input\CreateUserRequest;
use Src\admin\user\application\services\CreateUserService;

final class CreateUserPOSTController extends Controller
{
    private $createUserService;

    public function __construct(CreateUserService $createUserService)
    {
        $this->createUserService = $createUserService;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        

        $dto = new CreateUserRequest(
            $request->input('name'),
            $request->input('email'),
            $request->input('password')
        );

        $this->createUserService->execute($dto);
        return response()->json([], 201);
    }
}
