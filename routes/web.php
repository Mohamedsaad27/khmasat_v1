<?php

use App\Http\Controllers\Admin\BenefitPropertyController;
use App\Http\Controllers\Admin\TypePropertyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\SocialLoginController;
use App\Http\Controllers\Website\PropertiesPageController;


require __DIR__ . '/auth.php';


/*
    |--------------------------------------------------------------------------
    | FRONTEND ROUTES
    |--------------------------------------------------------------------------
    | These routes handle all the frontend views and functionalities accessible
    | by users or guests. They manage the user interface, site navigation, and
    | public-facing content.
    |--------------------------------------------------------------------------
*/
Route::group([
    'middleware',
    'as' => 'front.'
], function () {

    //--------------------------------/* HOME ROUTE */--------------------------------
    Route::get('/', [HomeController::class, 'handleHomePage'])->name('welcome');
    Route::get('/home-search', [HomeController::class, 'search'])->name('homeSearch');

    //--------------------------------/* TYPE PROPERTIES ROUTE */--------------------------------
    Route::resource('type-properties', TypePropertyController::class);

    //--------------------------------/* PROPERTIES ROUTE */---------------------------
    Route::get('/properties', function () {
        return view('front.properties');
    })->name('properties');
    Route::get('/properties', [PropertiesPageController::class, 'index'])->name('properties');


    //--------------------------------/* BENEFIT PROPERTIES ROUTE */--------------------------------
    Route::resource('benefit-properties', BenefitPropertyController::class);

    //--------------------------------/* PROPERTY-DETILES ROUTE */----------------------
    Route::get('/property-detiles/{property}', [PropertyController::class, 'show'])->name('property-detiles');

    //--------------------------------/* FAVORITE ROUTE */------------------------------
    Route::get('/favorite', function () {
        return view('favorite');
    })->name('favorite');

});

/*
|-------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
| These routes are reserved for the admin panel. Admins have full access
| to manage users, roles, permissions, and other sensitive settings.
|--------------------------------------------------------------------------
*/
Route::group(
    [
        'prefix' => 'admin',
        'middleware' => 'admin',
    ],
    function () {

        //--------------------------------/* DASHBOARD ROUTE */--------------------------------
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

        //--------------------------------/* PROPERTY ROUTES */--------------------------------
        Route::resource('/properties', PropertyController::class);
        Route::resource('/categories', CategoryController::class);

    }
);

Route::get('auth/{provider}/redirect', [SocialLoginController::class, 'redirect'])->name('auth.socialite.redirect');
Route::get('auth/{provider}/callback', [SocialLoginController::class, 'callback'])->name('auth.socialite.callback');

Route::get('/unauthorized', function () {
    return view('unauthorizedPage');
})->name('unauthorizedPage');


Route::get('filter', [PropertiesPageController::class, 'filter'])->name('filter');
