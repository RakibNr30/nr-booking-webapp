<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes([
    'register' => false,
    'reset' => false,
]);

/*
Route::post('handle-payment', 'App\Http\Controllers\PayPalPaymentController@handlePayment')->name('make.payment');
Route::get('cancel-payment', 'App\Http\Controllers\PayPalPaymentController@paymentCancel')->name('cancel.payment');
Route::get('payment-success', 'App\Http\Controllers\PayPalPaymentController@paymentSuccess')->name('success.payment');

Route::post('stripe/handle-payment', 'App\Http\Controllers\StripeController@stripePayment')->name('stripe.make.payment');
*/
