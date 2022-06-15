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

Route::get('country_import_excel', 'ImportExcelController@country_index');
Route::post('country_import_excel', 'ImportExcelController@country_import');
Route::get('country_export_excel', 'ImportExcelController@country_export');

Route::get('state_import_excel', 'ImportExcelController@state_index');
Route::post('state_import_excel', 'ImportExcelController@state_import');
Route::get('state_export_excel', 'ImportExcelController@state_export');

Route::get('city_import_excel', 'ImportExcelController@city_index');
Route::post('city_import_excel', 'ImportExcelController@city_import');
Route::get('city_export_excel', 'ImportExcelController@city_export');

Route::get('country_state_city','CountryStateCityController@index');
Route::post('get_states_by_country','CountryStateCityController@getState');
Route::post('get_cities_by_state','CountryStateCityController@getCity');


