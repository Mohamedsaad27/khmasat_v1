<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


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
], function () {

    //--------------------------------/* HOME ROUTE */--------------------------------
    Route::get('/', function () {
        return view('front.index');
    })->name('front.welcome');

    //--------------------------------/* PROPERTIES ROUTE */--------------------------------
    Route::get('/properties', function () {
        return view('front.properties');
    })->name('front.properties');

    //--------------------------------/* PROPERTY-DETILES ROUTE */--------------------------------
    Route::get('/property-detiles', function () {
        return view('front.property-detiles');
    })->name('front.property-detiles');

});

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
| These routes are reserved for the admin panel. Admins have full access
| to manage users, roles, permissions, and other sensitive settings.
|--------------------------------------------------------------------------
*/
Route::group(
    [
        'prefix' => 'admin'
    ]
    ,
    function () {

        //--------------------------------/* PROPERTY ROUTES */--------------------------------
        Route::group([
            'prefix' => 'property'
        ], function () {

            // Create Property
            Route::get('/create', function () {
                return view('admin.property.create');
            });

        });

    }
);



