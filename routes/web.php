<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Website\PropertiesPageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\SocialLoginController;


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

    //--------------------------------/* PROPERTIES ROUTE */---------------------------
    Route::get('/properties', [PropertiesPageController::class, 'getProperties'])->name('properties');

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
    }
);

Route::get('auth/{provider}/redirect', [SocialLoginController::class, 'redirect'])->name('auth.socialite.redirect');
Route::get('auth/{provider}/callback', [SocialLoginController::class, 'callback'])->name('auth.socialite.callback');

Route::get('/unauthorized', function () {
    return view('unauthorizedPage');
})->name('unauthorizedPage');


Route::get('filter',[PropertiesPageController::class,'filter'])->name('filter');