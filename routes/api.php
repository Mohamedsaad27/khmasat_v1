<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TypePropertyController;
use App\Http\Controllers\Website\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\PropertiesPageController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('filter', [PropertiesPageController::class, 'filter'])->name('filter');
Route::get('/properties/search', [HomeController::class, 'search']);


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

    //--------------------------------/* PROPERTIES ROUTE */---------------------------
    Route::get('/properties', [PropertiesPageController::class, 'getProperties']);

    //--------------------------------/* TypeProperty ROUTE */---------------------------
    Route::get('/types-property', [TypePropertyController::class, 'index']);

    //--------------------------------/* CATEGORIES ROUTE */---------------------------
    Route::get('/categories', [CategoryController::class, 'index']);


});
