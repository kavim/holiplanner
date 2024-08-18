<?php

use App\Http\Controllers\PlanController;
use Illuminate\Support\Facades\Route;

Route::apiResource('plans', PlanController::class);

Route::get('plans-pdf/{plan}', [PlanController::class, 'generatePdf'])->name('plans.pdf');
