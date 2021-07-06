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

// site routes
Route::resource('site', 'SiteController')->only(['index', 'update']);
// contact routes
Route::resource('contact', 'ContactController')->only(['index', 'update']);
// seo routes
Route::resource('seo', 'SeoController')->only(['index', 'update']);
// api routes
Route::resource('api', 'ApiController')->only(['index', 'update']);
