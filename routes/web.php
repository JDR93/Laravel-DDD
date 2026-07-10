<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin/user')->group(base_path('src/admin/user/infrastructure/routes/web.php'));