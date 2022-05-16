<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers;
use \App\Http\Controllers\Admin;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\Customer;

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

/**
 * Routes untuk authentication
 */
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.post');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::prefix('admin')->middleware('is_admin')->namespace('\App\Http\Controllers\Admin')->group(function() {
    Route::get('/dashboard', 'DashboardController@index')->name('admin.home');

    Route::prefix('products')->group(function() {
        Route::get('/list', 'ProductController@index')->name('admin.product.main');
        Route::get('/create', 'ProductController@create')->name('admin.product.create');
        Route::get('/store', 'ProductController@store')->name('admin.product.store');
        Route::get('/detail/{any}', 'ProductController@show')->name('admin.product.detail');
        Route::get('/edit/{any}', 'ProductController@edit')->name('admin.product.edit');
        Route::get('/update/{any}', 'ProductController@update')->name('admin.product.update');
        Route::DELETE('/delete/{any}', 'ProductController@delete')->name('admin.product.delete');
    });

    Route::prefix('orders')->group(function() {
        Route::prefix('pending')->group(function() {
            Route::get('/list', 'OrderController@index')->name('admin.order.pending');

        });

        Route::prefix('completed')->group(function() {
            Route::get('/list', 'OrderController@index')->name('admin.order.completed');

        });
    });

});