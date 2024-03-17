<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BusinessController;

Route::group(['middleware' => 'auth'], function () {
    // Define routes that require authentication here
    Route::get('/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/businesses', [BusinessController::class, 'index'])->name('admin.businesses');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/loginPost', [AuthController::class, 'login'])->name('loginPost');

