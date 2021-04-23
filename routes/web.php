<?php

use App\Http\Controllers\Admin\SellerVerificationController;
use App\Http\Controllers\AdminController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\BuyerProfileController;
use App\Http\Controllers\SellerBlogController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\SellerProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::get('/email/verify', function () {
    return view('buyer.auth.verify-email');
})->middleware('auth:buyer')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect()->route('tourist.dashboard');
})->middleware(['auth:buyer', 'signed'])->name('verification.verify');


Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth:buyer', 'throttle:6,1'])->name('verification.send');

// guide routes
Route::prefix('guide')
    ->name('guide.')
    ->namespace('guide.')
    ->group(function () {
        Route::middleware(['guest:seller'])->group(function () {
            // login route
            Route::get('login', [SellerController::class, 'login_form'])->name('loginForm');
            Route::post('login', [SellerController::class, 'login'])->name('login');

            // register route
            Route::get('register', [SellerController::class, 'register_form'])->name('registerForm');
            Route::post('register', [SellerController::class, 'register'])->name('register');
        });
        Route::middleware(['auth:seller'])->group(function () {
            // dashboard
            Route::get('dashboard', [SellerController::class, 'dashboard'])->name('dashboard');

            // profile page
            Route::get('profile', [SellerProfileController::class, 'create'])->name('profileForm');
            Route::post('profile/{id}', [SellerProfileController::class, 'store'])->name('profile');

            // blog
            Route::get('blog', [SellerBlogController::class, 'index'])->name('blogShow');
            Route::get('blog/create', [SellerBlogController::class, 'create'])->name('blogCreate');
            Route::post(
                'blog/store',
                [SellerBlogController::class, 'store']
            )->name('blogStore');


            // logout
            Route::get('logout', [SellerController::class, 'logout'])->name('logout');
        });
    });





// buyer routes
Route::prefix('tourist')
    ->name('tourist.')
    ->namespace('tourist.')
    ->group(function () {
        Route::middleware(['checkguest'])->group(function () {
            // login route
            Route::get('login', [BuyerController::class, 'login_form'])->name('loginForm');
            Route::post('login', [BuyerController::class, 'login'])->name('login');

            // register route
            Route::get('register', [BuyerController::class, 'register_form'])->name('registerForm');
            Route::post('register', [BuyerController::class, 'register'])->name('register');
        });
        Route::middleware(['auth:buyer', 'verified'])->group(function () {
            // dashboard
            Route::get('dashboard', [BuyerController::class, 'dashboard'])->name('dashboard');

            // Profile Page
            Route::get('profile', [BuyerProfileController::class, 'create'])->name('profileForm');
            Route::post('profile/{id}', [BuyerProfileController::class, 'store'])->name('profile');

            // logout
            Route::get('logout', [BuyerController::class, 'logout'])->name('logout');
        });
    });




// admin routes
Route::prefix('admin')
    ->name('admin.')
    ->namespace('admin.')
    ->group(function () {
        Route::middleware(['guest'])->group(function () {
            // login route
            Route::get('login', [AdminController::class, 'login_form'])->name('loginForm');
            Route::post('login', [AdminController::class, 'login'])->name('login');
        });
        Route::middleware(['auth:admin'])->group(function () {
            // dashboard
            Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

            // Show sellers
            Route::get('sellers', [SellerVerificationController::class, 'sellers'])->name('sellers');
            // verify seller
            Route::get('selller/verify/{id}', [SellerVerificationController::class, 'verification'])->name('sellerVerification');

            // Profile Page
            // Route::get('profile', [])

            // logout
            Route::get('logout', [AdminController::class, 'logout'])->name('logout');
        });
    });
