<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/blank', function () {
    return view('blank');
});

Auth::routes();

Route::get('/customer', 'CustomerController@index')->name('customer');
Route::get('/cuscreate', 'CustomerController@create')->name('cuscreate');
Route::get('/editcus/{$id}', 'CustomerController@edit')->name('editcus');
Route::get('/cusreg', 'CustomerController@store')->name('cusreg');

Route::get('/revenue', 'RevenueController@index')->name('revenue');


Route::get('/home', 'HomeController@index')->name('home');
