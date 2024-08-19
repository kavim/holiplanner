<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PlanController;

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('plans', PlanController::class);

    Route::get('plans-pdf/{plan}', [PlanController::class, 'generatePdf'])->name('plans.pdf');
});

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout']);
