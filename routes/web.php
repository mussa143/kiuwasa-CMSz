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

Route::group(['middleware' => ['auth', 'admin']], function() {
    
});

Route::resource('customer','CustomerController');
Route::resource('source','SourcesController');
Route::resource('revenue','RevenueController');
Route::resource('rcategory','RcategoriesController');
Route::resource('zone','ZonesController');


Route::get('/revenue', 'RevenueController@index')->name('revenue');
Route::get('/search','SearchController@searchs');
Route::get('/revsearch','SearchController@searchr');


Route::get('/home', 'HomeController@index')->name('home');
