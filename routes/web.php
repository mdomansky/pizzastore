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

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('cart', 'CartController@index')->name('cart');
Route::post('cart/store', 'CartController@store')->name('cart.store');
Route::get('cart/{id}', 'CartController@order_details')->name('order_details');
