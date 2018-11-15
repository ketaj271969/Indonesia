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

    // Route::get('/indonesia','CountryController@provinces');
    Route::get('/indonesia','CountryController@ptbtregion');
    
    Route::get('/json-ptbtcountry','CountryController@ptbtcountry');
    
    Route::get('/json-ptbtstprov', 'CountryController@ptbtstprov');
    
    Route::get('/json-ptbtcity', 'CountryController@ptbtcity');
