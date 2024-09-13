<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


require __DIR__ . '/auth.php';



Route::get('/admin', function () {
    return view('layouts.admin.admin-layout');
})->name('admin');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
 * FRONT ROUTES
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


Route::resource('category', CategoryController::class);



