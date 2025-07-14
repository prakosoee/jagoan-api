<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlowController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\QuizController;
use App\Http\Controllers\Api\LevelController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\RoadmapController;
use App\Http\Controllers\Api\ContributorController;
use App\Http\Controllers\Api\QuizQuestionController;
use App\Http\Controllers\ParticipantController;

Route::get('/roadmap/{title}', [RoadmapController::class, 'getRoadmap']);

Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/refresh', [AuthController::class, 'refresh']);

    Route::middleware('jwtAuth')->group(function () {
        Route::get('/me', [AuthController::class, 'me']);
        Route::post('/logout', [AuthController::class, 'logout']);
    });
});

Route::middleware(['jwtAuth', 'role:peserta'])->group(function () {
    Route::get('/courses', [CourseController::class, 'index']);
    Route::get('/courses/{id}', [CourseController::class, 'show']);
});

Route::group(['middleware' => 'jwtAuth'], function(){
    Route::group(['middleware' => ['checkRole:peserta,admin']], function () {
    
    });
});

Route::middleware(['jwtAuth', 'role:admin'])->group(function () {
    Route::apiResource('contributor', ContributorController::class);
    Route::apiResource('roadmap', RoadmapController::class)->except('show', 'edit');
    Route::apiResource('flow', FlowController::class);
    Route::apiResource('level', LevelController::class);
    Route::apiResource('course', CourseController::class);
    Route::apiResource('quiz', QuizController::class);
    Route::apiResource('question', QuizQuestionController::class);
    Route::get('/participant', [ParticipantController::class, 'index']);
});