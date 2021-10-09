<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

// General
Route::view('/', 'welcome')->name('welcome');
Route::view('/terms', 'pages.terms')->name('terms');
Route::view('/privacy', 'pages.privacy')->name('privacy');

// Dashboard
Route::middleware(['auth'])->group(function () {

    // General
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::view('/dashboard/notifications', 'dashboard.notifications.index')->name('dashboard.notifications.index');
    
    // Account
    Route::view('/dashboard/account', 'dashboard.account.overview.index')->name('dashboard.account.index');
    Route::view('/dashboard/account/api', 'dashboard.account.api.index')->name('dashboard.account.api');
    Route::view('/dashboard/account/security', 'dashboard.account.security.index')->name('dashboard.account.security');
    
});

Route::view('/docs', 'docs.index')->name('docs.index');