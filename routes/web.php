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

Route::group(['middleware' => ['auth']], function() {
    Route::get('/', function () {
        return view('admin.index');
    });
    //category route
    Route::get('/category', 'CategoryController@index')->name('getcategory');
    Route::post('/addcategory', 'CategoryController@store')->name('savecategory');
    //service route
    Route::get('/service', 'ServiceController@index')->name('getservice');
    Route::post('/addservice', 'ServiceController@store')->name('saveservice');
    //Route::post('/deletecategory/{id}', 'CategoryController@destroy')->name('deletecategory');
    
    //team route
    Route::get('/team', 'TeamController@index')->name('getteam');
    Route::post('/addteam', 'TeamController@store')->name('saveteam');
    
    //project Route
    Route::get('/project', 'ProjectController@index')->name('getproject');
    Route::post('/addproject', 'ProjectController@store')->name('saveproject');
    Route::get('/home', 'HomeController@index')->name('home');
    // your routes
});
Auth::routes();
