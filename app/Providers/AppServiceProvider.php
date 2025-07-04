<?php

namespace App\Providers;

use App\Interfaces\Repositories\ContributorRepository;
use App\Interfaces\Repositories\CourseRepository;
use App\Interfaces\Repositories\FileRepository;
use App\Interfaces\Repositories\LevelRepository;
use App\Interfaces\Repositories\QuizQuestionRepository;
use App\Interfaces\Repositories\QuizRepository;
use App\Interfaces\Repositories\RoadmapRepository;
use App\Repositories\UserRepositoryImpl;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\Repositories\UserRepository;
use App\Repositories\ContributorRepositoryImpl;
use App\Repositories\CourseRepositoryImpl;
use App\Repositories\FileRepositoryImpl;
use App\Repositories\LevelRepositoryImpl;
use App\Repositories\QuizQuestionRepositoryImpl;
use App\Repositories\QuizRepositoryImpl;
use App\Repositories\RoadmapRepositoryImpl;

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
        $this->app->bind(RoadmapRepository::class, RoadmapRepositoryImpl::class);
        $this->app->bind(LevelRepository::class, LevelRepositoryImpl::class);
        $this->app->bind(CourseRepository::class, CourseRepositoryImpl::class);
        $this->app->bind(QuizRepository::class, QuizRepositoryImpl::class);
        $this->app->bind(QuizQuestionRepository::class, QuizQuestionRepositoryImpl::class);
    }
}
