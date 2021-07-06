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

Route::resource('/', 'HomeController')->only(['index']);
//Route::resource('about', 'AboutController')->only(['index']);
Route::resource('contact', 'ContactController')->only(['index']);
Route::resource('faq', 'FaqController')->only(['index']);
Route::resource('page', 'PageController')->only(['show']);
Route::resource('privacy-policy', 'PrivacyPolicyController')->only(['index']);
Route::resource('destination', 'DestinationController')->only(['index', 'show']);
Route::resource('booking', 'BookingController')->only(['store']);

// hotel routes
Route::prefix('hotel')->name('hotel.')->group(function () {
    Route::get('booking/{slug}', 'HotelController@booking')->name('booking');
    Route::get('search-result', 'HotelController@search')->name('search');
    Route::get('search-result/{slug}', 'HotelController@show')->name('search-result.show');
});
