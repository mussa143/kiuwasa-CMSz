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
    $revenue = DB::table('revenue')->sum('amount');
    $expenditure = DB::table('expenditures')->sum('amount');
    return view('welcome', compact('revenue','expenditure'));
});

Route::get('/blank', function () {
    return view('blank');
});

	
Route::get('charts', 'ChartController@index');

Auth::routes();

Route::group(['middleware' => ['auth', 'admin']], function() {
    
});

Route::resource('customer','CustomerController');
Route::resource('source','SourcesController');
Route::resource('revenue','RevenueController');
Route::resource('rcategory','RcategoriesController');
Route::resource('zone','ZonesController');
Route::resource('expenditure','ExpendituresController');
Route::resource('ex','ExController');

Route::resource('prod','ProductionController');




Route::get('/searchs','SearchController@searchs');
Route::get('/search','SearchController@search');
Route::get('/revsearch','SearchController@searchr');


Route::get('/home', 'HomeController@index')->name('home');
