<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\HomeController::class, 'home'])->name('main');

Auth::routes();


Route::group([
    'as' =>'agent.',
    'prefix' => 'agent',
],function (){
    Route::group([
        'middleware' => ['can:agent', 'auth']
    ], function () {
        Route::resource('cars', \App\Http\Controllers\Agent\AgentCarController::class);
        Route::get('booked_cabs', [\App\Http\Controllers\Agent\AgentCarController::class, 'index'])->name('cars.booked_cabs');
    });
    Route::get('/register',[\App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
});

Route::group([
    'as' =>'customer.',
    'prefix' => 'customer',
],function (){
    Route::group([
        'middleware' => ['can:customer', 'auth']
    ], function () {
    });
    Route::get('/create_booking', [\App\Http\Controllers\HomeController::class,'createBooking'])->name('create_booking');
    Route::get('/show_booked_cabs', [\App\Http\Controllers\HomeController::class,'showCustomerBookedCabs'])->name('show_booked_cabs');
    Route::post('/book_cab', [\App\Http\Controllers\HomeController::class,'bookCab'])->name('book_cab');
    Route::get('/register',[\App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
});

//Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
