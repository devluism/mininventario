<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/clear-cache', function () {
    Artisan::call('optimize:clear');
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return true;
});

Route::controller(AuthController::class)->group(function ($router) {
    Route::post('login', 'login');
    Route::post('logout', 'logout');
    Route::get('auth/user', 'getAuthUser');
});

Route::get('/', function () {
    return view('welcome');
});
