<?php

use Illuminate\Support\Facades\Route;
use Src\admin\user\infrastructure\controllers\CreateUserPOSTController;
use Src\admin\user\infrastructure\controllers\GetAllUsersGETController;
use Src\admin\user\infrastructure\controllers\GetUserByIdGETController;

Route::get('/', function () {
    return "hello world";
});

Route::get('/users', [GetAllUsersGETController::class, 'all']);
Route::get('/users/{id}', [GetUserByIdGETController::class, 'show'])
     ->whereNumber('id');

