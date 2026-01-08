<?php


use Src\admin\user\infrastructure\controllers\CreateUserPOSTController;
use Src\admin\user\infrastructure\controllers\GetUserByIdGETController;

Route::post('/store', [CreateUserPOSTController::class, 'index']);
Route::get('/{id}', [GetUserByIdGETController::class, 'index']);