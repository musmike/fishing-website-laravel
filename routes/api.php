<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostApiController;
use App\Http\Controllers\Api\FishApiController;
use App\Http\Controllers\Api\CommentApiController;
use App\Http\Controllers\Api\OrderApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Authentication (Public)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Posts (Public)
Route::get('/posts', [PostApiController::class, 'index']);
Route::get('/posts/{id}', [PostApiController::class, 'show']);

// Fishes / Catches (Public list/details)
Route::get('/fishes', [FishApiController::class, 'index']);
Route::get('/fishes/{id}', [FishApiController::class, 'show']);

// Comments / Opinions (Public list)
Route::get('/comments', [CommentApiController::class, 'index']);

// Protected routes (Sanctum Bearer token required)
Route::middleware('auth:sanctum')->group(function () {
    // Auth & Profile
    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // Fishes
    Route::post('/fishes', [FishApiController::class, 'store']);
    Route::put('/fishes/{id}', [FishApiController::class, 'update']);
    Route::delete('/fishes/{id}', [FishApiController::class, 'destroy']);

    // Comments
    Route::post('/comments', [CommentApiController::class, 'store']);
    Route::put('/comments/{id}', [CommentApiController::class, 'update']);
    Route::delete('/comments/{id}', [CommentApiController::class, 'destroy']);

    // Orders
    Route::get('/orders', [OrderApiController::class, 'index']);
    Route::post('/orders', [OrderApiController::class, 'store']);
});
