<?php

use Illuminate\Support\Facades\Route;

// General
Route::view('/', 'welcome')->name('welcome');
Route::view('/terms', 'pages.terms')->name('terms');
Route::view('/privacy', 'pages.privacy')->name('privacy');

// Dashboard
Route::middleware(['auth'])->group(function () {

    // General
    Route::view('/dashboard', 'dashboard.index')->name('dashboard');
    Route::view('/dashboard/notifications', 'dashboard.notifications.index')->name('dashboard.notifications.index');
    
    // Account
    Route::view('/dashboard/account', 'dashboard.account.overview.index')->name('dashboard.account.index');
    Route::view('/dashboard/account/privacy', 'dashboard.account.privacy.index')->name('dashboard.account.privacy');
    Route::view('/dashboard/account/security', 'dashboard.account.security.index')->name('dashboard.account.security');
    Route::view('/dashboard/account/api', 'dashboard.account.api.index')->name('dashboard.account.api');
    
});