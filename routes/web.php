<?php

use App\Http\Controllers\Admin\AddEditorController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\SellerVerificationController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\GuideController;
use App\Http\Controllers\Admin\RegulationController as AdminRegulationController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\TouristController;
use App\Http\Controllers\Admin\TripController as AdminTripController;
use App\Http\Controllers\Admin\TutorialController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\BookTripController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\BuyerProfileController;
use App\Http\Controllers\EditiorController;
use App\Http\Controllers\Guide\ImageController;
use App\Http\Controllers\Guide\RegulationController;
use App\Http\Controllers\Guide\TutorialController as GuideTutorialController;
use App\Http\Controllers\Page\ContactUsController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\SellerProfileController;
use App\Http\Controllers\SiteProfileController;
use App\Http\Controllers\Tourist\RegulationController as TouristRegulationController;
use App\Http\Controllers\Tourist\TripController as TouristTripController;
use App\Http\Controllers\Tourist\TutorialController as TouristTutorialController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

// public routes
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
// blogs
Route::get('/blogs', [WelcomeController::class, 'blogs'])->name('blogs');
Route::get('/single-blog/{id}', [WelcomeController::class, 'single_blog'])->name('singleBlog');
// trip routs
Route::get('/trips', [WelcomeController::class, 'trips'])->name('trips');
Route::get('/single-trip/{id}', [WelcomeController::class, 'single_trip'])->name('singleTrip');
// pages routes
Route::get('/about-us', [WelcomeController::class, 'about_us'])->name('about-us');
Route::resource('contact-us', ContactUsController::class);
// search routes
Route::post('search', [SearchController::class, 'search'])->name('search');

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
    ->group(function () {
        Route::middleware(['guest:seller'])->group(function () {
            // login route
            Route::get('/', [SellerController::class, 'login_form'])->name('loginForm');
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

            // video
            Route::resource('videos', VideoController::class);

            //image
            Route::resource('images', ImageController::class);

            // trips
            Route::resource('trips', TripController::class);
            // blog
            // Route::Resource('blog', SellerBlogController::class);
            // Route::post(
            //     'blog/store',
            //     [SellerBlogController::class, 'store']
            // )->name('blogStore');


            // tutorials
            Route::resource('tutorials', GuideTutorialController::class);
            // document/regulation
            Route::resource('regulations', RegulationController::class);

            // setting
            Route::get('setting', [SellerController::class, 'setting'])->name('setting');
            Route::post('setting', [SellerController::class, 'updatePassword'])->name('update-password');
            // logout
            Route::get('logout', [SellerController::class, 'logout'])->name('logout');
        });
    });





// buyer routes
Route::prefix('tourist')
    ->name('tourist.')
    ->group(function () {
        Route::middleware(['checkguest'])->group(function () {
            // login route
            Route::get('/', [BuyerController::class, 'login_form'])->name('loginForm');
            Route::get('login', [BuyerController::class, 'login_form'])->name('loginForm');
            Route::post('login', [BuyerController::class, 'login'])->name('login');

            // register route
            Route::get('register', [BuyerController::class, 'register_form'])->name('registerForm');
            Route::post('register', [BuyerController::class, 'register'])->name('register');

            // forget password:
            Route::get('forget-password', [BuyerController::class, 'forget_password'])->name('forgetPassword');
            Route::post('forget-password', [BuyerController::class, 'change_password'])->name('changePassword');
            Route::get('/reset-password', function (Request $request) {
                if (!$request->hasValidSignature()) {
                    abort(401);
                } else {
                    return view('buyer.auth.password.reset');
                }

                // ...
            })->name('resetPassword')->middleware('signed');
            Route::post('reset-Password/{email}', [BuyerController::class, 'reset_password'])->name('chnagePassword')->middleware('signed');
        });
        Route::middleware(['auth:buyer', 'verified'])->group(function () {
            // dashboard
            Route::get('dashboard', [BuyerController::class, 'dashboard'])->name('dashboard');

            // Profile Page
            Route::get('profile', [BuyerProfileController::class, 'create'])->name('profileForm');
            Route::post('profile/{id}', [BuyerProfileController::class, 'store'])->name('profile');

            // Trips

            Route::get('my-trips', [TouristTripController::Class, 'taken_trips'])->name('takenTrips');
            Route::resource('trips', TouristTripController::class);

            // book trip
            Route::get('booking-confirm', [BookTripController::class, 'confirmed'])->name('bookingConfirmed');
            Route::resource('book-trip', BookTripController::class);

            // tutorials
            Route::resource('tutorials', TouristTutorialController::class);
            // document/regulation
            Route::resource('regulations', TouristRegulationController::class);

            // setting
            Route::get('setting', [BuyerController::class, 'setting'])->name('setting');
            Route::post('setting', [BuyerController::class, 'updatePassword'])->name('update-password');

            // logout
            Route::get('logout', [BuyerController::class, 'logout'])->name('logout');
        });
    });




// admin routes
Route::prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::middleware(['guest:admin'])->group(function () {
            // login route
            Route::get('/', [AdminController::class, 'login_form'])->name('loginForm');
            Route::get('login', [AdminController::class, 'login_form'])->name('loginForm');
            Route::post('login', [AdminController::class, 'login'])->name('login');
        });
        Route::middleware(['auth:admin'])->group(function () {
            // dashboard
            Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

            // editors
            Route::get('editor-status/{id}', [AddEditorController::class, 'active'])->name('editor-status');
            Route::resource('editors', AddEditorController::class, ['names' => 'editor']);


            // tourists
            Route::get('tourist-status/{id}', [TouristController::class, 'active'])->name('tourist-status');
            Route::resource('tourists', TouristController::class);


            // guides ud
            Route::get('guide-status/{id}', [GuideController::class, 'active'])->name('guide-status');
            Route::get('selller/verify/{id}', [SellerVerificationController::class, 'verification'])->name('sellerVerification');
            Route::resource('guides', GuideController::class);
            // articles
            Route::resource('article-categories', BlogCategoryController::class);
            Route::resource('articles', AdminArticleController::class);

            // public message
            Route::get('messages', [AdminController::class, 'messages'])->name('messages');
            Route::get('message/{id}', [AdminController::class, 'delete_messages'])->name('deletemessage');

            // team
            Route::resource('team', TeamController::class);

            // site profile
            Route::resource('profile', SiteProfileController::class);
            // testimonail
            Route::resource('testimonials', TestimonialController::class);

            // trips
            Route::resource('trips', AdminTripController::class);

            //tutorial
            Route::resource('tutorials', TutorialController::class);
            // document/regulation
            Route::resource('regulations', AdminRegulationController::class);

            // logout
            Route::get('logout', [AdminController::class, 'logout'])->name('logout');
        });
    });











// editor routes
Route::prefix('editor')
    ->name('editor.')
    ->group(function () {
        Route::middleware(['guest:editor'])->group(function () {
            // login route
            Route::get('/', [EditiorController::class, 'login_form'])->name('loginForm');
            Route::get('login', [EditiorController::class, 'login_form'])->name('loginForm');
            Route::post('login', [EditiorController::class, 'login'])->name('login');
        });
        Route::middleware(['auth:editor'])->group(function () {
            // dashboard
            Route::get('dashboard', [EditiorController::class, 'dashboard'])->name('dashboard');

            // Show guide and verification
            Route::get('guides', [EditiorController::class, 'guides'])->name('guides');
            Route::get('guides/verify/{id}', [EditiorController::class, 'verification'])->name('guideVerification');

            // article
            Route::resource('articles', ArticleController::class);

            // tourist list
            Route::get('tourists', [EditiorController::class, 'tourists'])->name('tourists');

            // blog categories add
            Route::resource('blog-categories', BlogCategoryController::class, [
                'names' => 'blogCategory'
            ]);

            // Profile Page
            // Route::get('profile', [])

            // logout
            Route::get('logout', [EditiorController::class, 'logout'])->name('logout');
        });
    });
