<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('landing_user')->group(base_path('src/landing/user/infrastructure/routes/api.php'));

Route::prefix('purchase_user')->group(base_path('src/purchase/user/infrastructure/routes/api.php'));
