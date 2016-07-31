<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', ['as' => 'home','uses' =>'WelcomeController@dashboard']);

Route::get('/', ['as' => 'login', 'uses' => 'WelcomeController@login']);

Route::get('/dashboard', ['as' => 'home','uses' =>'WelcomeController@dashboard']);

Route::post('/login', ['as' => 'doLogin', 'uses' => 'WelcomeController@doLogin']);

Route::get('/logout', ['as' => 'logout', 'uses' => 'WelcomeController@logout']);

Route::get('/safety-permit', ['as' => 'safety-permit.list', 'uses' => 'SafetyPermitController@index']);
Route::get('/accident-report', ['as' => 'accient-report.list', 'uses' => 'AccidentController@index']);
Route::get('/emergency-report', ['as' => 'emergency-report.list', 'uses' => 'EmergencyController@index']);

Route::get('/ajax/detail/{tipe}/{id}', ['as' => 'safety-permit.detail', 'uses' => 'AjaxController@detail']);
Route::get('/ajax/konfirmasi/{tipe}/{id}', ['as' => 'safety-permit.konfirmasi', 'uses' => 'AjaxController@konfirmasi']);

Route::get('/ws/emergency/insertForm', ['as' => 'emergency.mobile.insert.form', 'uses' => 'WSController@insertView']);
Route::post('/ws/emergency/insert', ['as' => 'emergency.mobile.insert', 'uses' => 'WSController@insertForm']);

Route::post('/ws/AccNear/insertnear', ['as' => 'emergency.mobile.insert.acc', 'uses' => 'WSController@insertAccidentForm']);
Route::post('/ws/AccNear/insertacc', ['as' => 'emergency.mobile.insert.near', 'uses' => 'WSController@insertNearmissForm']);
Route::get('/ws/AccNear/{type}', ['as' => 'emergency.mobile.insert', 'uses' => 'WSController@insertNAView']);

Route::get('ws/sp/{tipe}', ['as' => 'safety-permit.mobile.insert.sp', 'uses' => 'WSController@insertSPView']);
Route::post('ws/sp/insert', ['as' => 'safety-permit.mobile.insert', 'uses' => 'WSController@insertSPForm']);