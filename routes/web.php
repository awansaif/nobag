<?php

use App\Http\Controllers\BuyerController;
use App\Http\Controllers\SellerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// guide routes
Route::prefix('guide')
    ->name('guide.')
    ->name('guide.')
    ->group(function () {
        Route::middleware(['guest'])->group(function () {
            // login route
            Route::get('login', [SellerController::class, 'login_form'])->name('loginForm');
            // register route
            Route::get('register', [SellerController::class, 'register_form'])->name('registerForm');
            Route::post('register', [SellerController::class, 'register'])->name('register');
        });
        Route::middleware(['auth:seller'])->group(function () {
        });
    });





// buyer routes
Route::prefix('tourist')
    ->name('tourist.')
    ->namespace('tourist.')
    ->group(function () {
        Route::middleware(['guest'])->group(function () {
            // login route
            Route::get('login', [BuyerController::class, 'login_form'])->name('loginForm');
            Route::post('login', [BuyerController::class, 'login'])->name('login');

            // register route
            Route::get('register', [BuyerController::class, 'register_form'])->name('registerForm');
            Route::post('register', [BuyerController::class, 'register'])->name('register');
        });
        Route::middleware(['auth:buyer'])->group(function () {
            Route::get('dahboard', [BuyerController::class, 'dashboard'])->name('dashboard');
        });
    });
