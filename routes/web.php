<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::group(['middleware' => 'auth'], function () {
    // Define routes that require authentication here
    Route::get('/admin_dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.admin_dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/loginPost', [AuthController::class, 'login'])->name('loginPost');

