<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

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
    Route::get('/peserta', function () {
        return response()->json([
            'message' => 'Welcome, Peserta!',
            'data' => [],
        ], 200);
    });
});

Route::middleware(['jwtAuth', 'role:admin'])->group(function () {
    Route::get('/peserta', function () {
        return response()->json([
            'message' => 'Welcome, Admin!',
            'data' => [],
        ], 200);
    });
});



// Route::middleware('jwtAuth')->group(function () {
//     Route::prefix('categories')->group(function () {
//         Route::get('/', [CategoryController::class, 'index']);
//         Route::post('/', [CategoryController::class, 'store']);
//     });

//     Route::get('products/search', [ProductController::class, 'search']);
//     Route::post('products/update-stock', [ProductController::class, 'updateStock']);
//     Route::apiResource('products', ProductController::class);

//     Route::get('inventory/value', [ProductController::class, 'inventoryValue']);
// });
