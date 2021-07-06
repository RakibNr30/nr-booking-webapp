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

// admin routes
Route::resource('admin', 'AdminController');
// profile routes
Route::prefix('profile')->name('profile-')->group(function () {
    // User account info routes...
    Route::resource('account-info', 'Profile\AccountInfoController')->only(['index', 'update']);
    // User personal info routes...
    Route::resource('personal-info', 'Profile\PersonalInfoController')->only(['index', 'update']);
    // User residential info routes...
    Route::resource('residential-info', 'Profile\ResidentialInfoController')->only(['index', 'update']);
    // User password change routes...
    Route::resource('password-change', 'Profile\PasswordChangeController')->only(['index', 'update']);
});
