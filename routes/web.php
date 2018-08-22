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
    return redirect()->route('properties.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/properties', 'PropertyController@index')->middleware('auth')->name('properties.index');
Route::get('/properties/create', 'PropertyController@create')->middleware('auth')->name('properties.create');
Route::post('/properties/create', 'PropertyController@store')->middleware('auth')->name('properties.store');


Route::get('/tenancies/{id?}', 'TenancyController@index')->middleware('auth')->name('tenancies.index')->where('id', '\d*');
Route::get('/tenancies/create', 'TenancyController@create')->middleware('auth')->name('tenancies.create');
Route::post('/tenancies/create', 'TenancyController@store')->middleware('auth')->name('tenancies.store');

Route::get('/tenants/{id?}', 'TenantController@index')->middleware('auth')->name('tenants.index')->where('id', '\d*');
Route::get('/tenants/create', 'TenantController@create')->middleware('auth')->name('tenants.create');
Route::post('/tenants/create', 'TenantController@store')->middleware('auth')->name('tenants.store');