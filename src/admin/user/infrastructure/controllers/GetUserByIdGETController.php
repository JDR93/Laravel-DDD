<?php

namespace Src\admin\user\infrastructure\controllers;

use App\Http\Controllers\Controller;
use Src\Admin\User\Application\GetUserByIdUseCase;
use Src\Admin\User\infrastructure\Repositories\EloquentUserRepository;

final class GetUserByIdGETController extends Controller
{

    public function index($id)
    {
        $getUserByIdUseCase = new GetUserByIdUseCase(new EloquentUserRepository());
        $getUserByIdUseCase->execute($id);

        return response()->json([
            'status' => true,
            'message' => 'User retrieved successfully',
            'data' => $getUserByIdUseCase->execute($id)
        ], 200);
    }
}
