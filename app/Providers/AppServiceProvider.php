<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Src\admin\user\infrastructure\repositories\EloquentUserRepository;
use Src\admin\user\application\services\CreateUserService;
use Src\admin\user\application\services\GetUserByIdService;
use Src\admin\user\domain\repositories\UserRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            UserRepositoryInterface::class,
            EloquentUserRepository::class
        );

        $this->app->bind(
            CreateUserService::class,
            function ($app) {
                return new CreateUserService($app->make(UserRepositoryInterface::class));
            }
        );

        $this->app->bind(
            GetUserByIdService::class,
            function ($app) {
                return new GetUserByIdService($app->make(UserRepositoryInterface::class));
            }
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
