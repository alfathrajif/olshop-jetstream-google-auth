<?php

use App\Http\Controllers\LoginWithGoogleController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth', 'level:admin']], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::group(['middleware' => ['auth', 'level:operator']], function () {
});

Route::group(['middleware' => ['auth', 'level:owner']], function () {
});

Route::group(['middleware' => ['auth', 'level:pelanggan']], function () {
});

Route::get('auth/google', [LoginWithGoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [LoginWithGoogleController::class, 'handleGoogleCallback']);
