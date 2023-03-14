<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function() {
    Route::get('/users', [Controllers\UsersController::class, 'getUsers']);
    Route::get('/todos', [Controllers\TodoController::class, 'get']);
    Route::get('/users/{userID}/todos', [Controllers\TodoController::class, 'byUser']);
});

Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);
