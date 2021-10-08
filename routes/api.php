<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {
   
    Route::get('/account/profile', function(Request $request) {
        return $request->user()->only([
            'name',
            'email',
            'email_verified_at',
            'avatar',
            'api_disclaimer_accepted_at',
            'terms_and_privacy_accepted_at',
            'created_at',
            'updated_at',
        ]);
    });
    
});