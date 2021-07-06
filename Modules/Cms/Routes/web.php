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

// dashboard routes
Route::resource('dashboard', 'DashboardController')->only(['index']);
// hotel routes
Route::resource('hotel', 'HotelController');
Route::post('hotel/status', 'HotelController@status')->name('hotel.status');
Route::post('hotel/{image}/remove-image', 'HotelController@removeImage')->name('hotel.remove-image');
// booking routes
Route::resource('booking', 'BookingController')->only(['index', 'show', 'create']);
Route::get('booking/{id}/export', 'BookingController@export')->name('booking.export');
// banner routes
Route::resource('banner', 'BannerController')->only(['index', 'update']);
// about routes
Route::resource('why-us', 'AboutController')->only(['index', 'update']);
// faq routes
Route::resource('faq', 'FaqController');
// page routes
Route::resource('page', 'PageController');
// privacy policy routes
Route::resource('privacy-policy', 'PrivacyPolicyController')->only(['index', 'update']);
