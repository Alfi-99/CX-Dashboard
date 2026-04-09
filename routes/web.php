<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PerformanceController;
use App\Http\Controllers\BappController;
use App\Http\Controllers\FinancialController;
use App\Http\Controllers\SdmController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/performance', [PerformanceController::class, 'index'])->name('performance');

Route::get('/bapp', [BappController::class, 'index'])->name('bapp');

Route::get('/financial', [FinancialController::class, 'index'])->name('financial');

Route::get('/sdm', [SdmController::class, 'index'])->name('sdm');
