<?php

namespace App\Providers;

use App\Interfaces\Repositories\ContributorRepository;
use App\Interfaces\Repositories\FileRepository;
use App\Repositories\UserRepositoryImpl;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\Repositories\UserRepository;
use App\Repositories\ContributorRepositoryImpl;
use App\Repositories\FileRepositoryImpl;

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
        $this->app->bind(UserRepository::class, UserRepositoryImpl::class);
        $this->app->bind(ContributorRepository::class, ContributorRepositoryImpl::class);
        $this->app->bind(FileRepository::class, FileRepositoryImpl::class);
    }
}
