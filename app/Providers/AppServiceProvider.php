<?php

namespace App\Providers;

use App\Repositories\UserRepositoryImpl;
use App\Services\AuthServiceImpl;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\Services\AuthService;
use App\Interfaces\Repositories\UserRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bind(AuthService::class, AuthServiceImpl::class);
        $this->app->bind(UserRepository::class, UserRepositoryImpl::class);
    }
}
